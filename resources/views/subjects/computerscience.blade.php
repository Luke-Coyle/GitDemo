@extends('layouts.app')

@section('content')
<head>
<title>UNI-Threads</title>
</head>
<div id ="title-card" style="padding-bottom:2%">
	<div style="padding-bottom:2%">	<h1>Computer Science</h1></div>
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
        <table > <thead><tbody>
           <tr><th><h2><b>Modules</b></h2><!-- Title to show what page you are on --></th></tr>
            <tr><td><a href=/cs210>CS210: Data Structures & Algorithms</a> </td></tr>
            <tr><td><a href=/cs320>CS320: Computer Networks</a></td></tr>
            <tr><td><a href=/cs357>CS357: Software Verification</a></td></tr>
            </tbody>
        </table>
    </div>




</div>
</body>
@endsection