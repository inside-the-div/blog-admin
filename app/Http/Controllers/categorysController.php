<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class categorysController extends Controller
{
    public function index(){

        $categorys = category::orderBy('id','DESC')->get();
    	return view('category.index',compact('categorys'));
    }

    public function edit($id){
    	$category = category::find($id);
        return view('category.edit',compact('category'));
    }
    public function add(Request $r){
    	$r->validate([
    		'name' => 'required|unique:categories|max:255',
    		'description' => 'required',
    		'tag' => 'required'
    	]);

    	$category = new category;
    	$category->name = $r->name;
    	$category->description = $r->description;
    	$category->seo_tag = $r->tag;

    	$category->save();

        return back();

    }

    public function delete(Request $r){
        $category = category::find($r->id);
        $category->delete();
        return back()->with('success','Category delete success');
    }

    public function update(Request $r){
        $category = category::find($r->id);

        $r->validate([
            'name' => 'required|unique:categories,name,'.$r->id,
            'description' => 'required',
            'tag' => 'required'
        ]);
        
        $category->name = $r->name;
        $category->description = $r->description;
        $category->seo_tag = $r->tag;
        $category->save();
        return back()->with('success','category update success');

    }

    public function show($id){
        $category = category::find($id);
        return view('category.details',compact('category'));
    }
}
