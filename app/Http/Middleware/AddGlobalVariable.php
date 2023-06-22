<?php
 
namespace App\Http\Middleware;
 
use Closure;
 use Auth;
 use View;
 use App\Models\Notification;
 use DB;
class AddGlobalVariable
{
    public function handle($request, Closure $next)
    {
         $notifications=DB::table('notifications')->where('notifiable_id',"=",Auth::id())->get();
        $sum=0;
       foreach($notifications as $notification){
           if($notification->read_at==null)
            $sum++;
      }
       $array=[
        'sum'=>$sum,
         'notifications'=>$notifications
       ];
        View::share('array', $array);

       return $next($request);
    }
}