<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;
class settingsController extends Controller
{
    public function index(){
    	$settings = setting::find(1);
    	return view('settings.index',compact('settings'));
    }
    public function update(Request $r){

    	$validatedData = $r->validate([
    	       'title'  		=> 'required',
    	       'description'    => 'required',
    	       'tag' 			=> 'required',
    	       'email' 			=> 'required',
    	       'heading' 		=> 'required',
    	       'facebook'		=> 'required',
    	       'linkedin' 		=> 'required',
    	       'github' 		=> 'required',
    	       'youtube' 		=> 'required',
    	       'codepen' 		=> 'required',
    	       'copyright' 		=> 'required',
    	   ]);


    	$settings = setting::find(1);
    	$settings->title = $r->title;
    	$settings->description = $r->description;
    	$settings->tag = $r->tag;
    	$settings->email = $r->email;
    	$settings->heading = $r->heading;
    	$settings->facebook = $r->facebook;
    	$settings->youtube = $r->youtube;
    	$settings->linkedin = $r->linkedin;
    	$settings->github = $r->github;
    	$settings->codepen = $r->codepen;
    	$settings->copyright = $r->copyright;
    	$settings->save();

    	return back()->with('success','Settings Update Success');
    }
}
