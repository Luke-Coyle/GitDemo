@extends('layouts.app')

@section('content')
<head>
<title>UNI-Threads</title>
</head>
<div id ="title-card" style="padding-bottom:2%">
	<div style="padding-bottom:2%">	<h1>Maths</h1></div>
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
            <tr><td><a href=/mt103>MT103: Calculus</a> </td></tr>
            <tr><td><a href=/mt201>MT201: Calculus 3</a></td></tr>
            <tr><td><a href=/mt212>MT212: Linear Algebra</a></td></tr>
            </tbody>
        </table>
    </div>




</div>
</body>
@endsection