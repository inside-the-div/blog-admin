<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
class postsController extends Controller
{
    public function index(){
        $posts = post::orderBy('id','desc')->get(); 
    	return view('post.index',compact('posts'));
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


    public function delete(Request $r){
        $post = post::find($r->id);

        $post->delete();
        return back()->with('success','Post Delete Success');
    }

    public function show($id){
       $post = post::find($id);
       return view('post.details',compact('post'));
    }

   public function edit($id){
   	$post = post::find($id);
    return view('post.edit',compact('post'));
   }

   public function update(Request $r){

        $post = post::find($r->post_id);

        $post->name         = $r->title;
        $post->body         = $r->body;
        $post->description  = $r->description;
        $post->tag          = $r->tag;
        $post->video        = $r->video;
        $post->code         = $r->code;
        $post->add_by       = $r->user_id;
        $post->save();
        return response()->json(['success','edit success']);
   }
}
