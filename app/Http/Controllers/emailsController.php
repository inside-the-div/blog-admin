<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\email;
class emailsController extends Controller
{




	public function check_permission(){
	    $permission = parent::this_user_permission();
	    if(in_array('email', $permission)){
	        return $permission;
	    }else{
	        return false;
	    }
	}

    public function index(){
    	$permission = $this->check_permission();

    	if($permission){
    		$emails = email::orderBy('seen','asc')->paginate(10);
    		return view('email.index',compact('emails','permission'));
    	}else{
    		return redirect()->route('home')->with('access','you have no access');
    	}
    	
    }

    public function details($id){
    	$permission = $this->check_permission();
    	if($permission){
    		$email = email::find($id);
    		$email->seen = 1;
    		$email->save();
    		return view('email.details',compact('email','permission'));
    	}else{
    		return redirect()->route('home')->with('access','you have no access');
    	}
    }

    public function delete(Request $r){

    	$r->validate([
    		'id' => 'required'
    	]);
    	$email = email::find($r->id);
    	$email->delete();
    	return redirect()->route('all-email')->with('success','Email delete success');

    }

    public function seen(Request $r){
    	$r->validate([
    		'id' => 'required'
    	]);
    	$email = email::find($r->id);
    	$email->seen = 1;
    	$email->save();
    	return redirect()->route('all-email')->with('success','Email seen success');
    }

    public function notSeen(Request $r){
    	$r->validate([
    		'id' => 'required'
    	]);
    	$email = email::find($r->id);
    	$email->seen = 0;
    	$email->save();
    	return redirect()->route('all-email')->with('success','Email not seen success');
    }
}
