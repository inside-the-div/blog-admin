<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\comment;
use App\category;
use App\email;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $permission = parent::this_user_permission();

        $posts = post::orderBy('id','desc')->get();
        $comments = comment::orderBy('id','desc')->get();
        $categorys = category::orderBy('id','desc')->get();
        $emails = email::orderBy('id','desc')->get();

       

        return view('home',compact('permission','posts','comments','categorys','emails'));
    }
}
