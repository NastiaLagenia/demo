<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function postIndex(){
		$id=(int)$_POST['id'];
		$obj=Product::find($id);
		return view('ajax.modal', compact('obj'));
	}
}
