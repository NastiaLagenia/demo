<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAll(){
		$cats=Category::all();
		return view ('cats', compact('cats'));
	}
}
