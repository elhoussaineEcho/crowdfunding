<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
class UserController extends Controller
{


   function profile(){
       return view('users.profile');
   }
   function updateInfo(Request $request){
    $this->validate($request,[
        'nom'=>'required',
        'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
        'prenom'=>'required |string|min:3|max:20',
        'ville'=>'required |string|min:2|max:20',
        'tel'=>'required |string|min:10|max:12',
        'userN'=>'required |string',
         
    ]);     
         $query = User::find(Auth::user()->id)->update([
              'nom'=>$request->nom,
              'email'=>$request->email,
              'prenom'=>$request->prenom,
              'ville'=>$request->ville,
              'tel'=>$request->tel,
         ]);
         $user=User::find(Auth::user()->id);
         $user->username=$request->userN;
         $user->update();
         if(!$query){
             return redirect()->back()->with("error",'Les modifications sont invalide');
         }else{
            return redirect()->back()->with('success','Les modifications est bien effectuées.');
        
    }
   }
   function updatePassword(Request $request){
    $this->validate($request,[
        'oldpassword'=>[
            'required', function($attribute, $value, $fail){
                if( Hash::check($value ,Auth::user()->password) ){
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

      
    $user = User::find(Auth::user()->id);
    $user->password=Hash::make($request->password);
     $update=$user->update();

     if( !$update ){
        return redirect()->back()->with("error",'la changement de votre password est invalid');
     }else{
        return redirect()->back()->with('success','Votre mot de passe est modifié.');
     }
    
   }

}
