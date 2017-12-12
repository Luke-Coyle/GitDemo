@extends('layouts.app')

@section('content')
<head>
<title>UNI-Threads</title>
</head>
<div id=title-card>
<a href="/profile"> My Profile </a><a href="/subjects"> Back to Subjects</a>

				<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search posts"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
             <span> Search </span>	
</div>
</div>

<div id=reg>


	<p>no posts Please refine search</p>


</div>
</body>
@endsection