@extends('layouts.app')



@section('content')
<head>
<title>UNI-Threads</title>
</head>




		<!--<h1>This is your profile page</h1>-->
       <div id="title-card"> 
	   <h1> Profile </h1>
	   
	   <a href="/subjects">Go Back to Subjects</a>
	  
	   
	
<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search posts"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
             <span> Search </span>	
            </button>
        </span>
    </div>
</form>
<br><br>
<h3>Your previous posts and comments:</h3>
 </div>
   
<div id="content">
	
	
	@if(count($posts)>0)
	<table id="table">

		<tr>
			<td>Title of Post</td>
			<td></td>
			<td></td>
		</tr>
		@foreach($posts as $post)
			<tr>
				<td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
				<td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
				<td>
						{!!Form::open(['action'=>['PostsController@destroy', $post->id],'method'=>'POST','class'=> 'pull-left'])!!}
   						{{Form::hidden('_method', 'DELETE')}}
   						{{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
						{!!Form::close()!!}
						
				</td>
				<td><a href="{{$post->module}}" >{{$post->module}}</a></td>
				
			</tr>
		@endforeach
	</table>
@else
<div id=reg><p> You have no posts </p></div>

@endif

@if(count($comments)>0)
	<table id="table">
	<div id="reg"><h2>***********************Comments***********************</h2></div>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		@foreach($comments as $comment)
		
			<tr>
				<td><a href="/posts/{{$comment->post_id}}">{!!$comment->body!!}</a></td>
				<td><a href="/comments/{{$comment->id}}/edit" class="btn btn-default">Edit</a></td>
				<td>
						
						<a href="/posts/{{$comment->post_id}}">{{$comment->post->title}}</a>
						
				<td>
				

			</tr>
		
		@endforeach
	</table>

	
@else
<div id=reg><p> You have no comments </p></div>

@endif


</div>
<div style="padding-bottom:5%">
</div>
</body>
@endsection