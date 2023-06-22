<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Porteur;
use App\Models\Document;
use App\Models\Projet;
use App\Models\User;
use App\Models\Dons;
use App\Models\Donnateur;
use App\Notifications\NewProjet;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewUserPostProject;
use Illuminate\Support\Facades\Validator;
USE Image;
use Auth;
use DB;
use Location;
use Carbon\Carbon;
use Storage;

class ProjectController extends Controller
{

  
   public function createView(){
 
     $porteur=Porteur::where("idUtilisateur","=",Auth::user()->id)->first();
      $infos = Storage::disk('local')->exists('data.json') ? json_decode(Storage::disk('local')->get('data.json')) : [];
      $villes=(array)$infos;
      $catigories=Categorie::all();
      if($porteur==null){
        return view('projet.create', ['catigories'=>$catigories,'villes'=>$villes]);
      }
      else{
        return view('projet.createOther', ['catigories'=>$catigories]);
      }

   }
   public function description($id,Request $request){

     $projet=Projet::find($id);
     if($projet==null){
      abort(404);
     }
     $donnateurs=Dons::where('idProjet',"=",$id)
     ->join('donnateurs','dons.idDonnateur',"=",'donnateurs.id')
     ->join('users','donnateurs.idUtilisateur',"=",'users.id')
     ->get();
     $duree_rest=0;
     if(Carbon::now()<$projet->datefinal){
      $duree_rest= Carbon::now()->diffInDays(Carbon::parse($projet->datefinal));
     }
     else {
      $duree_rest="fini";
     }
   
      return view('projet.description',['projets'=>$projet,"donnateurs"=>$donnateurs,'duree_rest'=>$duree_rest]);
   }
   
   //function to create a projet
   public function addProject(Request $request){
      $this->validate($request,[
      //validation persone who start the projet
      'prenom'=>['required','string','min:2','max:30'],
      'nom'=>['required','string','min:2','max:30'],
      'cni'=>['required','string','min:3','max:20'],
      'file-cni-recto'=>['required','image'],
      'file-cni-verso'=>['required','image'],
      'localisation'=>['required','string','min:10','max:50'],
      'tel'=>['required','string','min:10','max:12'],
     
      //-----------------------------------

      //--------validation for project-------------
         'attestation'=>['required','image'],
         'titre'=>['required','string','min:5','max:30'],
         'des'=>['required','string','min:50','max:200'],
         'description'=>['required'],
         'budget'=>['required','numeric'],
         'datefinal'=>['required',
                    'date',
          function($attribute,$value,$fail){
          if(Carbon::now()>Carbon::parse($value)){
            $fail("la date final du projet doit être superieur à la date d'aujourd'hui ".Carbon::now());
                  }
                }
                        ],
         'categorie'=>['required'],
          'image-principale'=>[
            'required',
            'image',
             function($attribute,$value,$fail){
               $width=Image::make($value)->width();
               $height=Image::make($value)->height();
               if(  600>$width ||300>$height){
                  $fail('width must be gruter than 600px current width ='.$width."and current height=".$height);
               }
             }

                 ],

     ],
     [
      'titre.required'=>'ce champs est obligatoire',
      'titre.string'=>'format du titre est invalide',
      'titre.min'=>'le titre est obligatoire de contient au miniment 1O caractères',
      'titre.max'=>'le titre est obligatoire de contient au maximent 40 caractères',

      'des.required'=>'La description du projet est obligatoire',
      'des.string'=>'invalide format pour la description',
      'des.min'=>'la description est obligatoire de contient au miniment 50 caractères',
      'des.max'=>'la description est obligatoire de contient au maximent 250 caractères',
       
      'budget.required'=>'Compang budget is required',
      'budget.string'=>'compang budget must be a Decimal',

      'cni.required'=>'cni must be required',
      'cni.string'=>'cni  must be a string',
     

  ]
   );
    DB::transaction(function() use ($request){
     
      $upload_cni_rectoPath='porteur/personal_file/cni/cni-recto/';
      $upload_cni_versoPath='porteur/personal_file/cni/cni-verso/';
      $allowedMimeTypes = ['image/jpeg','image/gif','image/png'];
      $file=$request->file('file-cni-recto');
      $ext=$file->getClientOriginalExtension();
      $filenameR= 'cni-recto'.time().'.'.$ext;
      $file->move($upload_cni_rectoPath,$filenameR);
            //  cni verso
      $file=$request->file('file-cni-verso');
      $ext=$file->getClientOriginalExtension();
      $filenameV= 'cni-verso'.time().'.'.$ext;
      $file->move($upload_cni_versoPath,$filenameV);
      $iduser=Auth::user()->id;
      $porteur=new Porteur();
      $porteur->idUtilisateur= $iduser;
      $user=User::find( $iduser);
      if($user->nom==null ||$user->prenom==null||$user->ville==null || $user->tel==null )
      {
        $user->prenom=$request->prenom;
        $user->nom=$request->nom;
        $user->tel=$request->tel;
        $user->ville=$request->ville;
        $var= $user->update();
      }
      $porteur->cni_file_recto=$filenameR;
      $porteur->cni_file_verso=$filenameV;
      $porteur->cni=$request->cni;
      $porteur->localisation=$request->localisation;
      $porteur->save();
  
    //------------------------------
     //add the information of the project 
     $upload_image_path="porteur/projet/images/";
     $file=$request->file('image-principale');
     $ext=$file->getClientOriginalExtension();
     $filename= 'image-principal'.time().'.'.$ext;
     $file->move($upload_image_path,$filename);
       $projet=new Projet();
       $projet->titre=$request->titre;
       $projet->description=$request->des;
       $projet->dateFinal=Carbon::parse($request->datefinal);
       $projet->budget=$request->budget;
       $projet->description_det=$request->description;
       $projet->idCategorie=$request->categorie;
       $projet->idPorteur=$porteur->id;
       $projet->image= $filename;
       $projetIsSave=$projet->save();
       //------------------------------
       //Add all document nessery to accept the project
        
       //add the document of  person whp start the project (cni-recto)
      $allowedMimeTypes = ['image/jpeg','image/gif','image/png'];
    
      $upload_attestation_Path='porteur/personal_file/attestation/';
      $file=$request->file('attestation');
      $ext=$file->getClientOriginalExtension();
      $filename= 'attestation'.time().'.'.$ext;
      $file->move($upload_attestation_Path,$filename);
      $document=new Document();
      $document->taille=4000;
      $document->path=$filename;
      $contentType = $request->file('attestation')->getClientMimeType();
      if(! in_array($contentType, $allowedMimeTypes) ){
       $document->type="fichier";
      }
      else{
      $document->type="image";
      }
      $document->idProjet=$projet->id;
      $document->nom="attestation";
      $is_sucess=$document->save();
  
 

      //---------------------------------

      //document of project--------------------------

      //-------------------------
 
      //upload all images that related with project
        // upload the description of project

     
        //-------------------------------
  
     //------------------------------------------
     // send the notification email to the admin after post new project
       $user=User::where('role','=',1)->first();
      //send notification database to the admin
      $user->notify(new NewUserPostProject($projet));
      return redirect()->back()->with("success"," Vous avez réussi à ajouter le projet, veuillez attendue l'acceptation de votre projet ");
    
    });
    return redirect()->back();
   }
   public function ajouterDon(Request $request){
    DB::transaction(function() use ($request){
      $iduser=Auth::user()->id;
      $donnateur=new Donnateur();
      $donnateur->idUtilisateur= $iduser;
      $user=User::find( $iduser);
      if($user->nom==null ||$user->prenom==null||$user->ville==null || $user->tel==null )
       {
        $user->prenom=$request->prenom;
        $user->nom=$request->nom;
        $var= $user->update();
       }
       $donnateur->save();
       return redirect()->back()->with("success","le don est bien effectué ");
    });
    



   }
  
   public function createOther(Request $request){
  //   dd($request->all());
  //   $this->validate($request,[


  //     //--------validation for project-------------
  //       'attestation'=>['required'],
  //       'titre'=>['required','string','min:5','max:30'],
  //       'des'=>['required','string','min:50','max:200'],
  //       'description'=>['required'],
  //       'budget'=>['required','numeric'],
  //       'datefinal'=>['required',
  //                   'date',
  //         function($attribute,$value,$fail){
  //         if(Carbon::now()>Carbon::parse($value)){
  //           $fail("la date final du projet doit être superieur à la date d'aujourd'hui ".Carbon::now());
  //                 }
  //               }
  //                       ],
  //        'categorie'=>['required'],
  //         'image-cara'=>[
  //           'required',
  //           'image',
  //            function($attribute,$value,$fail){
  //              $width=Image::make($value)->width();
  //              $height=Image::make($value)->height();
  //              if(  600>$width ||300>$height){
  //                 $fail('width must be gruter than 600px current width ='.$width."and current height=".$height);
  //              }
  //            }

  //                ],

  //    ],
  //    [
  //     'titre.required'=>'ce champs est obligatoire',
  //     'titre.string'=>'format du titre est invalide',
  //     'titre.min'=>'le titre est obligatoire de contient au miniment 1O caractères',
  //     'titre.max'=>'le titre est obligatoire de contient au maximent 40 caractères',

  //     'des.required'=>'La description du projet est obligatoire',
  //     'des.string'=>'invalide format pour la description',
  //     'des.min'=>'la description est obligatoire de contient au miniment 50 caractères',
  //     'des.max'=>'la description est obligatoire de contient au maximent 250 caractères',
       
  //     'budget.required'=>'Compang budget is required',
  //     'budget.string'=>'compang budget must be a Decimal',
       

  // ]
  //  );
   
  $is_sucess="";
    DB::transaction(function() use ($request){
      
     $porteur=Porteur::where('idUtilisateur',"=",Auth::user()->id)->first();
     $upload_image_path="porteur/projet/images/";
     $file=$request->file('image-cara');
     $ext=$file->getClientOriginalExtension();
     $filename= 'image-principal'.time().'.'.$ext;
     $file->move($upload_image_path,$filename);
      $projet=new Projet();
      $projet->titre=$request->titre;
      $projet->description=$request->des;
      $projet->dateFinal=Carbon::parse($request->datefinal);
      $projet->budget=$request->budget;
      $projet->description_det=$request->description;
      $projet->idCategorie=$request->categorie;
      $projet->idPorteur=$porteur->id;
      $projet->image= $filename;
      $projetIsSave=$projet->save();
   
      // add the document necessry

      $allowedMimeTypes = ['image/jpeg','image/gif','image/png'];
      
      $upload_attestation_Path='porteur/personal_file/attestation/';
      $file=$request->file('attestation');
      $ext=$file->getClientOriginalExtension();
      $filename= 'attestation'.time().'.'.$ext;
      $file->move($upload_attestation_Path,$filename);
      $document=new Document();
      $document->taille=4000;
      $document->path=$filename;
      $contentType = $request->file('attestation')->getClientMimeType();
      if(! in_array($contentType, $allowedMimeTypes) ){
       $document->type="fichier";
      }
      else{
      $document->type="image";
      }
      $document->idProjet=$projet->id;
      $document->nom="attestation";
      $is_sucess=$document->save();
      $user=User::where('role','=',1)->first();
      //send notification database to the admin
      $user->notify(new NewUserPostProject($projet));
       return redirect()->back()->with("success"," Vous avez réussi à ajouter le projet, veuillez attendue l'acceptation de votre projet ");

    });

    return redirect()->back();
   }
  }


