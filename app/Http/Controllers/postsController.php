<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\post;
use App\category;
use App\comment;
class postsController extends Controller
{

    public function check_permission(){
        $permission = parent::this_user_permission();
        if(in_array('post', $permission)){
            return $permission;
        }else{
            return false;
        }
    }


    public function index(){

        $permission = $this->check_permission();
        if($permission){
            $posts = post::orderBy('id','desc')->get(); 
            return view('post.index',compact('posts','permission'));
        }else{
            return redirect()->route('home')->with('access','you have no access');
        }


    }
    public function add(){
        $permission = $this->check_permission();
        if($permission){
            $categorys = category::all();
            return view('post.add',compact('categorys','permission'));
        }else{
            return redirect()->route('home')->with('access','you have no access');
        }
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
        // delete all comments 
        comment::where('post_id',$r->id)->delete();
        // delete pivot table category and post
        $cat_post = DB::table('category_post')->where('post_id',$r->id)->delete();
        // delete post
        $post->delete();

        return redirect()->route('all-post')->with('success','post deleted success');
    }

    public function show($id){

        $permission = $this->check_permission();
        if($permission){
           $post = post::find($id);
           return view('post.details',compact('post','permission'));
        }else{
            return redirect()->route('home')->with('access','you have no access');
        }
    }

   public function edit($id){

        $permission = $this->check_permission();
        if($permission){
            $post = post::find($id);
            $categorys = category::all();
            return view('post.edit',compact('post','categorys','permission'));
        }else{
            return redirect()->route('home')->with('access','you have no access');
        }
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
