@extends('layouts.app')

@section('content')
<head>
<title>UNI-Threads</title>
</head>
<div>
		<h1>Edit Your Comments</h1>
        {!! Form::open(['action'=>['CommentsController@update', $comment->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}

            <div class="form-group">
                {{Form::label('body', 'Comment')}}
                {{Form::textarea('body', $comment->body, ['id'=> 'article-ckeditor', 'class' => 'form-control', 'placeholder'=>'Share your knowledge here!'])}}
            </div> 
            <div class="form-group">
                {{Form::file('files')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn-primary'])}}
        {!! Form::close() !!}

</div>



@endsection