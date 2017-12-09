@extends('layouts.app')

@section('content')
<head>
<title>UNI-Threads</title>
</head>
<div id="title-card">
		<h1>MT212: Linear Algebra</h1>
        <a href="/maths">Go Back to Maths</a>
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
				<hr>

		{{link_to_action('PostsController@create', 'Create Post', array('mod'=>'mt212'), array('class' => 'btn btn-default'))}}
		
</div>
<h1>Post List, Have something to share? Share it here!</h1>
<div id="content">
<hr>
<div id="post">
		
		@if(count($posts)>0)
	@foreach($posts as $post)

			<div class="well">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<img style="width:50%" src="/storage/files/{{$post->files}}">
				</div>

				<div class="col-md-4 col-sm-4">
						<a href="/posts/{{$post->id}}">{{$post->title}}</a> 
						<small>Written on {{$post->created_at}}</small>
				</div>	
			</div>
		</div>
	@endforeach
@else
	<p>no posts</p>
@endif
	

</div>
</div>
</body>
@endsection