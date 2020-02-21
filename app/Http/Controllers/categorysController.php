<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class categorysController extends Controller
{
    public function index(){
    	return view('category.index');
    }

    public function edit(){
    	dd("edit page");
    }
    public function add(Request $r){
    	$r->validate([
    		'name' => 'required',
    		'description' => 'required',
    		'tag' => 'required'
    	]);

    	$category = new category;
    	$category->name = $r->name;
    	$category->description = $r->description;
    	$category->seo_tag = $r->tag;

    	$category->save();

    	return "success";

    }
}
