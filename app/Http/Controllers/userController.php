<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\permission;
class userController extends Controller
{   



    public function index(){

        $permission = parent::this_user_permission();
    	$users = User::where('id','>',1)->get();   
    	return view('user.index',compact('users','permission'));
    }

    public function add(){
        $permission = parent::this_user_permission();
        return view('user.add',compact('permission'));
    }


    public function store(Request $r){

    	$r->validate([
    		'name' => 'required',
    		'password' => 'required|min:8',
    		'c_password' => 'required:min:8',
    		'email' => 'required',
    		'permission' => 'required'

    	]);

    	if(count(User::where('email','=',$r->email)->get()) > 0){
    		return back()->withErrors(['Email' => ['User already exists']]);
    	}


    	if($r->password != $r->c_password){
    		return back()->withErrors(['password' => ['Please use same password']]);
    	}



    	$user = new User;

    	$user->name = $r->name;
    	$user->email = $r->email;
    	$user->password = $user->password = Hash::make($r->password);
    	$user->save();

    	$user_id = $user->id;

    	foreach ($r->permission as $value) {
    		$p = new permission;
    		$p->user_id = $user_id;
    		$p->page = $value;
    		$p->save();
    	}
    	return back()->with('success','User created success!');
    }

    public function edit($id){
    	$user = User::find($id);
    	$psermission = permission::where('user_id','=',$id)->get();
    	$psermissionArray =  [];
    	foreach ($psermission as  $value) {
    		array_push($psermissionArray,$value->page);
    	}
    	$permission = parent::this_user_permission();
    	return view('user.edit',compact('user','psermissionArray','permission'));
    }

    public function update(Request $r){

        $r->validate([
            'permission' => 'required',
            'user_id' => 'required'
        ]);
        $delete_permission = permission::where('user_id',$r->user_id)->delete();

        foreach ($r->permission as  $value) {
            $user_permission = new permission;
            $user_permission->user_id = $r->user_id;
            $user_permission->page = $value;
            $user_permission->save();
        }

        return back()->with('success','Permission Updated Success!');

    }

    public function delete(Request $r){
        $r->validate([
            'id' => 'required'
        ]);

        permission::where('user_id',$r->id)->delete();
        User::find($r->id)->delete();
        return back()->with('success','user delete success!!');
    }



}


