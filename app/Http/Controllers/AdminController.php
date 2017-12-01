<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //PROBLEM CODE
    {
        //$admin_id = auth()->user()->id;
       // $admin=Admin::find($admin_id);
        return view('admin');//->with('posts', $user->posts);
       
    }
}
