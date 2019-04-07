<?php

namespace App\Providers;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.messages',function($view){
            $role_id = Auth::User()->role_id;
            $user_id = Auth::User()->id;
            if($role_id==1){
                $count_notifications = DB::table('feedbacks')
                ->join('users','users.id','=','feedbacks.user_id')
                ->where('status','!=',1)
                ->select(
                    'users.name as sender',
                    'users.email',
                    'feedbacks.updated_at as time_send',
                    'feedbacks.id',
                    'feedbacks.status'
                )
                ->get();
            }else{
                $count_notifications = DB::table('feedbacks')
                ->where('status',1)
                ->where('feedbacks.user_id',$user_id)
                ->select(
                    'feedbacks.updated_at as time_send',
                    'feedbacks.id',
                    'feedbacks.status'
                )
                ->get();
                }

            $count_notifications = json_decode(json_encode($count_notifications),True);
                
            // $loaisp = Loaisanpham::all();
            $view->with('count_notifications',$count_notifications);
        });
    }
}
