<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
class PagesController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>['welcome']]);
    }

    public function welcome()
    {
        return view('pages.welcome');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function subjects()
    {
        return view('subjects.subjects');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function english()
    {
        return view('subjects.english');
    }

    public function maths()
    {
        return view('subjects.maths');
    }

    public function computerscience()
    {
        return view('subjects.computerscience');
    }


    public function cs210()
    {   
        
       // $name = User::where('user_id',$user_id)->get('name');
       $user_id = auth()->user()->id;
       $user=User::find($user_id);

        return view('mods.cs210')->with('user', $user);
    }

    public function cs320()
    {
        return view('mods.cs320');
    }

    public function cs357()
    {
        return view('mods.cs320');
    }

    public function en101()
    {
        return view('mods.en101');
    }

    public function en203()
    {
        return view('mods.en203');
    }

    public function en260()
    {
        return view('mods.en260');
    }

    public function mt103()
    {
        return view('mods.mt103');
    }

    public function mt201()
    {
        return view('mods.mt201');
    }

    public function mt212()
    {
        return view('mods.mt212');
    }

    public function profile()
    {   $user_id = auth()->user()->id;
        $user=User::find($user_id);
        return view('pages.profile')->with('posts', $user->posts)->with('comments', $user->comments);
    }
    public function home()
    {   $user_id = auth()->user()->id;
        $user=User::find($user_id);
        return view('pages.profile')->with('posts', $user->posts)->with('comments', $user->comments);
    }
    
}
