<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use App\post;
class commentsController extends Controller
{	

	public function index(){
		$comments = comment::orderBy('id','desc')->get();
		return view('comment.index',compact('comments'));
	}

	public function show(Request $r){
		$comment = comment::where('id',$r->id)->first();
		$comment->active = 1;
		$comment->save();
		return back()->with('success','Comment show success');
	}

	public function hide(Request $r){
		$comment = comment::where('id',$r->id)->first();
		$comment->active = 0;
		$comment->save();
		return back()->with('success','Comment hide success');
	}

    public function delete(Request $r){
    	$comment = comment::where('id',$r->id)->first();
    	$comment->delete();
    	return redirect()->route('all-comments')->with('success','comment deleted success');
    }

    public function details($id){
    	$comment = comment::where('id',$id)->first();
    	$post_id = $comment->post_id;
    	$post = post::where('id',$post_id)->first();

    	return view('comment.details',compact('comment','post'));

    }
}
