@extends('layouts.app')

@section('content')
<head>
<title>UNI-Threads</title>
</head>
<div>
		<h1>Create new Post</h1>
        {!! Form::open(['action'=>'PostsController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder'=>'Title'])}}
            </div> 
            <div class="form-group">
                {{Form::label('module', 'Module')}}
                {{Form::text('module', '', ['class' => 'form-control', 'placeholder'=>'Please put module code here e.g. MT103 Calculus 1 should be written as: mt103'])}}
            </div> 
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder'=>'Share your knowledge here!'])}}
            </div> 
            <div class="form-group">
                {{Form::file('files')}}
            </div>

            {{Form::submit('Submit', ['class'=>'btn-primary'])}}
        {!! Form::close() !!}

</div>



@endsection