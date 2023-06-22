<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Projet;
use App\Models\Document;
use App\Models\Notification;
use App\Notifications\NewProjet;
use App\Notifications\RefuseProjet;
use Auth;
use Crypt;
use DB;
use Carbon\Carbon;
class AdminController extends Controller
{
    function index(){
        // $projets=Projet::where('projets.id',">",-1)
        // ->join('dons','projets.id',"=",'dons.idProjet')
        // ->join('donnateurs','dons.idDonnateur',"=",'donnateurs.id')
        // ->join('users','donnateurs.idUtilisateur',"=",'users.id')
        // ->get();
        $projets= Projet::all();
        $sumBudget=Projet::all()->sum('budget');
        $sumTotal=Projet::all()->sum('total');
        $avg= $sumTotal*100/$sumBudget;

        $number_of_projetsTerminer=Projet::where('datefinal',"<",Carbon::now())->get();
        $numbre_of_projets_active=Projet::where('is_active',"=",1)->get();
        $number_of_projetsActiveTerminer=Projet::where('datefinal',"<",Carbon::now(),"and",'is_active',"=",1)->get();
        $numbre_of_user=User::where('role',"=",0)->get();
        $projet_finance=Projet::where('budget',"=","total")->get();

    

        return view('dashboards.admins.index',   ['numbre_of_user'=>$numbre_of_user,'projets'=>$projets,'projets_terminer'=>$number_of_projetsTerminer,'projets_active'=>$numbre_of_projets_active,"avg"=>$avg,'projet_finance'=>$projet_finance]);
       }
       function raison(){
        return view('dashboards.admins.raison');
       }
  
    
       function profile(){
           return view('dashboards.admins.profile');
       }
       function settings(){
           return view('dashboards.admins.settings');
       }
      public function description($id){
        $idd= Crypt::decrypt($id);
        $projet=Projet::where('id',"=",$idd)->first();
        $data=[
          'infoProjet'=>[
              'titre'=>$projet->titre,
               'description'=>$projet->description,
               'dateFinal'=>$projet->datefinal,
               'budget'=>$projet->budget
          ],
          'infoPorteur'=>[
                'nom'=>$projet->porteur->user->nom,
                'prenom'=>$projet->porteur->user->prénom,
                'email'=>$projet->porteur->user->email,
                'cni'=>$projet->porteur->cni,
                'location'=>$projet->porteur->localisation
          ],
          'document'=>[
            'cni'=>Document::where(["idProjet"=>$idd,'name'=>"cni"])->pluck('path'),
            'photo'=>Document::where(["idProjet"=>$idd,'name'=>"photo-personnel"])->pluck('path'),
            'images'=>Document::where(["idProjet"=>$idd,'name'=>null])->pluck('path'),
          ]
           



        ];
        

        return view('dashboards.admins.description',compact('data'));
       }

       function updateInfo(Request $request){
           
               $validator = \Validator::make($request->all(),[
                   'nom'=>'required',
                   'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
                   'prenom'=>'required',
               ]);

               if(!$validator->passes()){
                   return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
               }else{
                    $query = User::find(Auth::user()->id)->update([
                         'nom'=>$request->nom,
                         'email'=>$request->email,
                         'prenom'=>$request->prenom,
                         'ville'=>$request->ville,
                    ]);

                    if(!$query){
                        return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
                    }else{
                        return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
                    }
               }
       }

       function updatePicture(Request $request){
           $path = 'users/images/';
           $file = $request->file('admin_image');
           $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';
           //Upload new image
           $upload = $file->move(public_path($path), $new_name);
           if( !$upload ){
            
               return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
           }else{
               //Get Old picture
               $oldPicture = User::find(Auth::user()->id)->getAttributes()['image' ];

               if( $oldPicture != null ){
                   if( \File::exists(public_path($path.$oldPicture))){
                       \File::delete(public_path($path.$oldPicture));
                   }
               }

               //Update DB
               $update = User::find(Auth::user()->id)->update(['image' =>$new_name]);

               if( !$upload ){
                   return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
               }else{
                   return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
               }
           }
       }

     //change the password
       function changePassword(Request $request){
           //Validate form
           $validator = \Validator::make($request->all(),[
               'oldpassword'=>[
                   'required', function($attribute, $value, $fail){
                       if( !\Hash::check($value== Auth::user()->password) ){
                           return $fail(__('The current password is incorrect'));
                       }
                   },
                   'min:8',
                   'max:30'
                ],
                'newpassword'=>'required|min:8|max:30',
                'cnewpassword'=>'required|same:newpassword'
            ],[
                'oldpassword.required'=>'Enter your current password',
                'oldpassword.min'=>'Old password must have atleast 8 characters',
                'oldpassword.max'=>'Old password must not be greater than 30 characters',
                'newpassword.required'=>'Enter new password',
                'newpassword.min'=>'New password must have atleast 8 characters',
                'newpassword.max'=>'New password must not be greater than 30 characters',
                'cnewpassword.required'=>'ReEnter your new password',
                'cnewpassword.same'=>'New password and Confirm new password must match'
            ]);

           if( !$validator->passes() ){
               return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
           }else{
                
            $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

            if( !$update ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
            }
           }
       }
       public function getInformation(Request $request){
        if($request->ajax()){
    //     DB::table('notification')->update('id',$request->idNotification)->marksRead();
    $affected = DB::update(
        'update notifications set read_at =now() where id = ?',
        [$request->idNotification]
    );
            $output=array();
            $projet=Projet::find($request->idProjet);
          
            $path='porteur/projet/images/'.$projet->image;
            $des_route='user.description';
            $document_route='admin.document';
            $output[]='
            <table border="0" width="100%">
            <tr>
                
                <td style="padding:20px;">
                <p><b>Titre</b> :'.$projet->titre.'</p>
                <p><b>Description</b> :'.$projet->description.'</p>
                <p><b>Budget</b> :'.$projet->budget.'DH </p>
                <p><b>Categorie</b> :'.$projet->categorie->nom.'</p>
                </td>
            </tr>
            </table>
            <a href="'.route($des_route,$projet->id).'">  <button type="button" id="btn-description" class="btn btn-primary">vue détails</button> </a>
            <a href="'.route($document_route,$projet->id).'">   <button  id="btn-cart-nationale" type="button" class="btn btn-success">
            <i class="bi bi-folder"></i> Documents
            </button></a>
            ';
             return response()->json( $output) ;
        }
       }
   public function getDocument($id){
    $documents=Document::where('idProjet',"=",$id)->get();
    return view('dashboards.admins.layouts.document',compact('documents'));
   }
   public function getAction($id){
    $projets=Projet::where('id',"=",$id)->get();
    return view('dashboards.admins.layouts.consulter',compact('projets'));
   }
       public function accepter($id){
      $projet=Projet::where('id',"=",$id)->first();
    
      $projet->is_active=1;
      $user= $projet->porteur->user->id;
      $var=$projet->update();
      $user=User::where('id','=',$user)->first();
   //send notification database to the admin
       $user->notify(new NewProjet($projet));
   if($var){
    return redirect()->back()->with('success', 'projet accepted and notification sent.');
   }
 else{
    return redirect()->back()->with('error', 'post accepted and notification sent.');
 }

   }
   public function refuser(Request $request,$id){
    $raison=$request->selectRaison.' <br>'.$request->raison.'';;
    $projet=Projet::where('id',"=",$id)->first();
    
    $projet->is_active=-1;
    $user= $projet->porteur->user->id;
    $var=$projet->update();
    $user=User::where('id','=',$user)->first();
 //send notification database to the admin
     $user->notify(new RefuseProjet($projet,$raison));
 if($var){
  return redirect()->back()->with('success', 'projet est réfuser.');
 }
else{
  return redirect()->back()->with('error', 'post accepted and notification sent.');
}
   }
}
