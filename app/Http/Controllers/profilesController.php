<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
class profilesController extends Controller
{
    public function index(){
    	$user = User::find(Auth::user()->id);
    	return view('profile.index',compact('user'));
    }

    public function update(Request $r){
    	$user = User::find(Auth::user()->id);

    	$user->name = $r->name;
    	$user->about = $r->about;
    	$user->phone = $r->phone;
    	$user->address = $r->address;
    	$user->save();
    	return back()->with('success','Profile update success');
    }


    public function changePassword(Request $r){

    	$r->validate([
	        'old_password' 		=> 'required|min:8',
	        'new_password'		=> 'required|min:8',
	        'c_new_password' 	=> 'required|min:8',
	        
    	]);

    	$user = User::find(Auth::user()->id);

    	$hashedPassword = $user->password;

    	$old_password = $r->old_password;
    	$new_password = $r->new_password;
    	$c_new_password = $r->c_new_password;

    	if($new_password != $c_new_password){
    		return back()->withErrors(['new password and confirm password' => ['Please use same password']]);
    	}

    	if (Hash::check($new_password, $hashedPassword)) {
    	    return back()->withErrors(['Old password' => ['Incorrect Password']]);
    	}


    	$user->password = Hash::make($r->new_password);
    	$user->save();
    	return back()->with('success','Password change success');

    }
}
