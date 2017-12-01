@extends('layouts.app')

@section('content')
<head>
<title>UNI-Threads</title>
</head>
<a href="/profile"> My Profile </a><a href="/subjects"> Back to Subjects</a>

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

<div>
		<h1>Search Results for <b>{{$query}} </b> :</h1>
        

				<hr>


</div>

<div id="content">
	
		<hr>
		@if(isset($details))
	@foreach($details as $post)
		<div class="well">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<img style="width:100%" src="/storage/files/{{$post->files}}">
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
</body>
@endsection