<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Order;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Order::created(function($obj){
			if(isset($obj->email)){
				$user_email=$obj->email;
				$name=$obj->fio;
			}elseif(Auth::user()){
				$user_email=Auth::user()->email;
				$name=Auth::user()->name;
			}
			$thema='Уважаемый '.$name.' Вам сообщение с сайта';
			$thema_admin='Admin '.$name.' Вам сообщение с сайта';
			$body='<h1>текст</h1>';
			$body_admin='<h1>admin</h1>';
			//clear header
			$header='MIME-Version: 1.0'. "\r\n";
			$header.='Content-type: text/html; charset=UTF-8'. "\r\n";
			$header.='From: '.env('MAIL_FROM_ADDRESS'). "\r\n";
		@mail($user_email, $thema, $body, $header);
		@mail(env('MAIL_FROM_ADDRESS'), $thema_admin, $body_admin, $header);
		});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
