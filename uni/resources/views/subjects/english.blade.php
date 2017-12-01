@extends('layouts.app')

@section('content')
<head>
<title>UNI-Threads</title>
</head>
<div id ="title-card" style="padding-bottom:2%">
	<div style="padding-bottom:2%">	<h1>English</h1></div>
        <a href="/subjects">Go Back to Subjects</a>
		<div>
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
</div>

<div id="content">
	
	
	
	
<div id="table">
        <table> <thead><tbody>
            <tr><th><h2>Modules</h2><!-- Title to show what page you are on --></th></tr>
            <tr><td><a href=/en101>EN101: Foundational English</a> </td></tr>
            <tr><td><a href=/en203>EN203: Literary Forms</a></td></tr>
            <tr><td><a href =/en260>EN260: Great Books</a></td></tr>
            </tbody>
        </table>
    </div>




</div>
</body>
@endsection