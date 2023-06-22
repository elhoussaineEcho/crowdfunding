<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Hash;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
      protected function redirectTo(){
          if( Auth()->user()->role == 1){
              return route('admin.dashboard');
          }
          elseif( Auth()->user() == 0){
              return route('user.dashboard');
          }
      }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
      
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
       
       $user=User::where('email',"=",$request->email)->first();
     
       if ($user && Hash::check($request->password, $user->password)){
           Auth::login($user);
             if(Auth::check()){
             if($user->role==0){
               return redirect()->route('index');
            }
            else if($user->role==1){
               return redirect()->route('admin.dashboard');
            }
           }
           else{
            return redirect()->route('login')->with('error','you have some problem');
           }
          
             }
       
        else{
         return redirect()->route('login')->with('error','Email ou password invalide');
       }
    }
    public function logout(Request $request) {
       
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
             return redirect()->route('index');
      }
}
