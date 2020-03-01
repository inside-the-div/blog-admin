<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\post;
use App\category;
use App\comment;
use App\User;
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
            $posts = post::orderBy('id','desc')->where('add_by',Auth::user()->id)->get(); 
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

       $posts =  post::where('name',$r->title)->get();
       if(count($posts) > 0){
            return response()->json(['success'=>'Post Already added!']);
       }else{
            $post->save();
            $post->category()->sync($r->category);
            return response()->json(['success'=>'Post added success!']);
       }

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

           if($post->add_by == Auth::user()->id){
            $comments = $post->comments()->paginate(10);
            return view('post.details',compact('post','permission','comments'));
           }else{
            return redirect()->route('all-post')->with('access','you can not view this post');
           }
           
        }else{
            return redirect()->route('home')->with('access','you have no access');
        }
    }

   public function edit($id){

        $permission = $this->check_permission();
        if($permission){
            $post = post::find($id);

            if($post->add_by == Auth::user()->id){
                $categorys = category::all();
                return view('post.edit',compact('post','categorys','permission'));
            }else{
                return redirect()->route('all-post')->with('access','you can not edit this post');
            }


            
        }else{
            return redirect()->route('home')->with('access','you have no access');
        }
   }

   public function update(Request $r){

        $post = post::find($r->post_id);

        $this_post_name = $post->name;

        $post->name         = $r->title;
        $post->body         = $r->body;
        $post->description  = $r->description;
        $post->tag          = $r->tag;
        $post->video        = $r->video;
        $post->code         = $r->code;
        $post->add_by       = $r->user_id;



        if($this_post_name == $r->title){
            // nothing change to title
            $post->save();
            $cat_post = DB::table('category_post')->where('post_id',$r->post_id)->delete();
            $post->category()->sync($r->category);
            return response()->json(['success'=>1]);

        }else{
            // maybe changed not title
            $change = post::where('name','=',$r->title)->get();
            if(count($change)>0){
                return response()->json(['success'=>0]);
            }else{
                $post->save();
                $cat_post = DB::table('category_post')->where('post_id',$r->post_id)->delete();
                $post->category()->sync($r->category);
                return response()->json(['success'=>1]);
            }
            
        }


        





   }
}
