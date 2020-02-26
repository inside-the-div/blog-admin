<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\permission;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function this_user_permission(){
    	$id =  Auth::user()->id;


    	$user = User::find($id);
    	$psermission = permission::where('user_id','=',$id)->get();
    	$psermissionArray =  [];
    	foreach ($psermission as  $value) {
    		array_push($psermissionArray,$value->page);
    	}

        // check if user is super admin

        if($id == 1){

            array_push($psermissionArray,'user');
            array_push($psermissionArray,'settings');
            array_push($psermissionArray,'other');

        }

    	return $psermissionArray;
    }

}
