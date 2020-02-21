<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
class postsController extends Controller
{
    public function index(){
    	 return view('post.index');
    }
    public function add(){
    	return view('post.add');
    }


    public function store(Request $r){

    	$post = new post;

    	$post->name = $r->title;
    	$post->body = $r->body;
    	$post->description = $r->description;
    	$post->tag = $r->tag;
    	$post->video = $r->video;
    	$post->code = $r->code;
    	$post->add_by = $r->user_id;

    	$post->save();
    	return response()->json(['success'=>'post added success']);
    }

   public function edit(){
   	dd("edit page");
   }
}
