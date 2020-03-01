<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\aboutme;
use App\privacy;
class otherController extends Controller
{
	public function check_permission(){
	    $permission = parent::this_user_permission();
	    if(in_array('user', $permission)){
	        return $permission;
	    }else{
	        return false;
	    }
	}

    public function aboutme(){
    	$permission = $this->check_permission();
    	if($permission){
    	    $about = aboutme::find(1);
    	    return view('other.about',compact('about','permission'));
    	}else{
    	    return redirect()->route('home')->with('access','you have no access');
    	}
    }


    public function update_aboutme(Request $r){

    	$about = aboutme::find(1);
    	 $about->title = $r->title;
    	 $about->sub_title = $r->sub_title;
    	$about->about = $r->about_me;

    	$about->save();

    	return response()->json(['success'=>'Post added success!']);
    }


    public function privacy(){
    	$permission = $this->check_permission();
    	if($permission){
    	    $privacy = privacy::find(1);
    	    return view('other.privacy',compact('privacy','permission'));
    	}else{
    	    return redirect()->route('home')->with('access','you have no access');
    	}
    }

    public function update_privacy(Request $r){
    	$privacy = privacy::find(1);
    	$privacy->left_text = $r->left_text;
    	$privacy->right_text = $r->right_text;
    	$privacy->save();
    	return response()->json(['success'=>'Post added success!']);
    }
}
