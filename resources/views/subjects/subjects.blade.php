@extends('layouts.app')


@section('content')
<head>
<title>UNI-Threads</title>
<link type='text/css' rel="stylesheet" href='layouts/css/logcss.css'>



</head>

<body>
<div id="title-card">
	<h1>Welcome to UNI-Threads</h1>
<br> <br>
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


	
</div>

<div id = "table">
            <table> <thead><tbody>
            <tr><th><h2><strong>Subjects</strong></h2><!-- Title to show what page you are on --></th></tr>
            <tr><td><a href='/english'>English</a></td></tr>
            <tr><td><a href='/maths'>Maths</a></td></tr>
            <tr><td><a href='/computerscience'>Computer Science</a></td></tr>
            </tbody>
        </table>
 
 </div>
  </body>
@endsection