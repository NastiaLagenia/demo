<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\Libse\Cookies;

class OrderController extends Controller
{
   /* public function postOrder(){
		dd($_POST);
		dd($r->all());
	}*/
	public function postOrder(OrderRequest $r){
		 $all=[];
		 foreach($_POST as $key=>$value){
			 $id=(int)$key;
			 if($id>0){
				 $all[$id]=$value;
			 }
		 }
		 $body=serialize($all);
		 $r['user_id']=(Auth::guest())?0:Auth::user()->id;
		 $r['body']=$body;
		 Order::create($r->all());
		 
		/* foreach($_COOKIE as $key=>$value){
			 $id=(int)$key;
			 if($id>0){
				 setcookie($id, '', time()-1, '/');
			 }
		 }*/
		 $cook = new Cookies;
		 $cook->deleteAll();
		/* \App::make('App\Libse\Cookies')->deleteAll();*/
		 
		 return redirect()->back();
		
	}
	
}	
	
