<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postsController extends Controller
{
    public function index(){
    	 return view('post.index');
    }

       public function edit(){
       	dd("edit page");
       }
}
