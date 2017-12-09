<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Notification;
use App\Notifications\NewPost;
use App\User;
use App\Post;
use DB;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user=User::find($user_id);
        return view('pages.profile')->with('posts', $user->posts)->with('comments', $user->comments);
    }

    public function cs210()
    {   $posts=DB::select('SELECT * FROM posts WHERE module="cs210" ORDER BY created_at DESC ');
        return view('mods.cs210')->with('posts', $posts);
    }

    public function cs320()
    {
        $posts=DB::select('SELECT * FROM posts WHERE module="cs320" ORDER BY created_at DESC ');
        return view('mods.cs320')->with('posts', $posts);
    }

    public function cs357()
    {
        $posts=DB::select('SELECT * FROM posts WHERE module="cs357" ORDER BY created_at DESC ');
        return view('mods.cs357')->with('posts', $posts);
    }

    public function en101()
    {
        $posts=DB::select('SELECT * FROM posts WHERE module="en101" ORDER BY created_at DESC ');
        return view('mods.en101')->with('posts', $posts);
    }

    public function en203()
    {
        $posts=DB::select('SELECT * FROM posts WHERE module="en203" ORDER BY created_at DESC ');
        return view('mods.en203')->with('posts', $posts);
    }

    public function en260()
    {
        $posts=DB::select('SELECT * FROM posts WHERE module="en260" ORDER BY created_at DESC ');
        return view('mods.en260')->with('posts', $posts);
    }

    public function mt103()
    {
        $posts=DB::select('SELECT * FROM posts WHERE module="mt103" ORDER BY created_at DESC ');
        
        return view('mods.mt103')->with('posts', $posts);
    }

    public function mt201()
    {
        $posts=DB::select('SELECT * FROM posts WHERE module="mt201" ORDER BY created_at DESC ');
        return view('mods.mt201')->with('posts', $posts);
    }

    public function mt212()
    {
        $posts=DB::select('SELECT * FROM posts WHERE module="mt212" ORDER BY created_at DESC ');
        return view('mods.mt212')->with('posts', $posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'module'=>'required',
            'body'=>'required',
            'files' => 'image|nullable'

        ]);

        if($request->hasFile('files')){
            $filenameext=$request->file('files')->getClientOriginalName();
            $filename=pathinfo($filenameext, PATHINFO_FILENAME);
            $extension=$request ->file('files')->getClientOriginalExtension();
            $filenamestore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('files')->storeAs('public/files', $filenamestore);
        }
        else
        {
            $filenamestore='NA.jpg';
        
        }

        $post=new Post;
        $post->title=$request->input('title');
        $post->module=$request->input('module');
        $post->body=$request->input('body');
        $post->user_id=auth()->user()->id;
        $post->files=$filenamestore;
        $post->save();

       //Notification::route('mail','lukecoyle10@hotmail.com')->notify(new NewPost($post));
        return redirect('/profile')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =Post::find($id);
        
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post =Post::find($id);
        
        if(auth()->user()->id !==$post->user_id){
            return redirect('/subjects')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'module'=>'required',
            'body'=>'required'

        ]);

        if($request->hasFile('files')){
            $filenameext=$request->file('files')->getClientOriginalName();
            $filename=pathinfo($filenameext, PATHINFO_FILENAME);
            $extension=$request ->file('files')->getClientOriginalExtension();
            $filenamestore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('files')->storeAs('public/files', $filenamestore);
        }
        
        $post= Post::find($id);
        $post->title=$request->input('title');
        $post->module=$request->input('module');
        $post->body=$request->input('body');
        if($request->hasFile('files')){
            $post->files=$filenamestore;
        }
        $post->save();
        return redirect('/profile')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);

        if(auth()->user()->id !==$post->user_id){
            return redirect('/subjects')->with('error', 'Unauthorized Page');
        }

        if($post->files != 'NA.jpg'){
            Storage::delete('public/files/'.$post->files);
        }

        $post->delete();
        return redirect('/subjects')->with('success','Post Deleted');
    }
}
