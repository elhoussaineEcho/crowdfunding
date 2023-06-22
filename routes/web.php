<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\ProfileController;
namespace App\Http\Controllers\user\UserController;
namespace App\Http\Controllers\admin\AdminController;
namespace App\Http\Controllers\Auth\LoginController;
namespace App\Http\Controllers\user\ProjectController;
namespace App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\user\LoadMoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//all routes for all person search for our platform

    Route::get('/', 'App\Http\Controllers\user\LoadMoreController@index')->name('index');
    Route::get('discover/','App\Http\Controllers\user\LoadMoreController@discover')->name('discover');
    Route::get('/description/{id}','App\Http\Controllers\user\ProjectController@description')->name("user.description");
    






Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});
Route::group(['prefix'=>'admin', 'middleware'=>['auth','isAdmin','array']], function(){

    Route::get('dashboard','App\Http\Controllers\admin\AdminController@index')->name('admin.dashboard');
    Route::get('documents/{id}','App\Http\Controllers\admin\AdminController@getDocument')->name('admin.document');
    Route::get('profile','App\Http\Controllers\admin\AdminController@profile')->name('admin.profile');
    Route::get('settings','App\Http\Controllers\admin\AdminController@settings')->name('admin.settings');
    Route::get('raison','App\Http\Controllers\admin\AdminController@raison')->name('admin.raison');
   

    
    Route::get('list-of-notification','App\Http\Controllers\admin\NotificationController@getAllNotification')->name("admin.notification");
    Route::get('/description/{id}','App\Http\Controllers\admin\AdminController@description')->name("description");
    Route::get('marksread-notification/{$id}','App\Http\admin\Controllers\admin\NotificationController@marksRead')->name("marksread");
    Route::get('information-of-projet','App\Http\Controllers\admin\AdminController@getInformation')->name('admin.information');
    Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::get('projet/action{id}','App\Http\Controllers\admin\AdminController@getAction')->name('action');

    Route::post('update-profile-info','App\Http\Controllers\admin\AdminController@updateInfo')->name('adminUpdateInfo');
    Route::post('change-profile-picture','App\Http\Controllers\admin\AdminController@updatePicture')->name('adminPictureUpdate');
    Route::post('change-password','App\Http\Controllers\admin\AdminController@changePassword')->name('adminChangePassword');
    Route::post('accepter/{id}','App\Http\Controllers\admin\AdminController@accepter')->name('accepter');
    Route::post('refuser/{id}','App\Http\Controllers\admin\AdminController@refuser')->name('refuser');
   

   
});

Route::group(['prefix'=>'user', 'middleware'=>['auth','isUser']], function(){
Route::get('dashboard','App\Http\Controllers\user\UserController@index')->name('user.dashboard');
Route::get('profile','App\Http\Controllers\user\UserController@profile')->name('user.profile');
Route::get('create','App\Http\Controllers\user\ProjectController@createView')->name("user.create");
Route::get('settings',[UserController::class,'settings'])->name('user.settings');
 Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::post('create_project','App\Http\Controllers\user\ProjectController@addProject')->name('save_project');
Route::post('save_project','App\Http\Controllers\user\ProjectController@createOther')->name('save_other');
Route::post('change-password','App\Http\Controllers\user\UserController@updatePassword')->name('changePassword');
Route::post('update-profile-info','App\Http\Controllers\user\UserController@updateInfo')->name('userUpdateInfo');

});

