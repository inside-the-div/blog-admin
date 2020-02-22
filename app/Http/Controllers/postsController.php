<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\post;
use App\category;
class postsController extends Controller
{
    public function index(){
        $posts = post::orderBy('id','desc')->get(); 
    	return view('post.index',compact('posts'));
    }
    public function add(){
        $categorys = category::all();
    	return view('post.add',compact('categorys'));
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

        //dd($r->category);

    	$post->save();

        $post->category()->sync($r->category);

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
    $categorys = category::all();
    return view('post.edit',compact('post','categorys'));
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
        
        $cat_post = DB::table('category_post')->where('post_id',$r->post_id)->delete();
        $post->category()->sync($r->category);
        return response()->json(['success','edit success']);
   }
}
