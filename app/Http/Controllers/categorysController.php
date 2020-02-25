<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\category;

class categorysController extends Controller
{
    public function check_permission(){
        $permission = parent::this_user_permission();
        if(in_array('category', $permission)){
            return $permission;
        }else{
            return false;
        }
    }
    public function index(){
        $permission = $this->check_permission();
        if($permission){
            $categorys = category::orderBy('id','DESC')->get();
            return view('category.index',compact('categorys','permission'));
        }else{
            return redirect()->route('home')->with('access','you have no access');
        }
    }

    public function edit($id){

        $permission = $this->check_permission();
        if($permission){
            $category = category::find($id);
            return view('category.edit',compact('category','permission'));
        }else{
            return redirect()->route('home')->with('access','you have no access');
        }

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

        return back()->with('success','category added success');

    }

    public function delete(Request $r){
        $category = category::find($r->id);
        DB::table('category_post')->where('category_id',$r->id)->delete();
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
        $permission = $this->check_permission();
        if($permission){
            $category = category::find($id);
            return view('category.details',compact('category','permission'));
        }else{
            return redirect()->route('home')->with('access','you have no access');
        }
    }
}
