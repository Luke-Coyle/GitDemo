@extends('layouts.app')

@section('content')
<head>
<title>UNI-Threads</title>
</head>
<div id="title-cardA">
		<h1>{{$post->title}}</h1>
        <a href="/{{$post->module}}">Go Back to {{$post->module}}</a>
</div>
        
   
<div id="image">
        <img style="width:85%" src="/storage/files/{{$post->files}}">
</div>
<div id="reg">
	<h4>{!!$post->body!!}</h4>
    <hr>
   <small>Written on {{$post->created_at}}</small>
</div>
@if(Auth::user()->id==$post ->user_id)
<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=>['PostsController@destroy', $post->id],'method'=>'POST','class'=> 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
{!!Form::close()!!}

@elseif(Auth::user()->name=="admin")
<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

{!!Form::open(['action'=>['PostsController@destroy', $post->id],'method'=>'POST','class'=> 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
@endif

<h1>******************COMMENTS***************************</h1>
<div class="row">
@if(count($post->comments)>0)
    @foreach($post->comments as $comment)
        <div class="comment">
        <hr>
            <h4> {!!$comment->body!!} </h4>
            <small>Written on {{$comment->created_at}} by {{$comment->user->name}}</small>

            @if(Auth::user()->id==$comment ->user_id)
                <a href="/comments/{{$comment->id}}/edit" class="btn btn-default">Edit</a>

            @elseif(Auth::user()->name=="admin")
                <a href="/comments/{{$comment->id}}/edit" class="btn btn-default">Edit</a>
        </div>
            @endif


    @endforeach

    @else
    <p>No comments</p>
@endif
</div>

<div class="row">
    <div id="comment-form">
    <hr>
    {{Form::open(['route' => ['comments.store', $post->id], 'method'=> 'POST'])}}
                {{Form::label('body', 'Comment: ') }}
                {{Form::textarea('body', null, ['class'=>'form-control'])}}

                {{Form::submit('Add Comment', ['class'=>' btn btn-success btn-block', 'style'=> 'margin-bottom:50px;']) }}


    {{Form::close()}}
    </div>

</div>
@endsection