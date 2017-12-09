@extends('layouts.app')


 <style>
#container{
    width: 100%;
    height: 100%;
}

body{
    background-image: url(https://thebestscreenprinting.com/wp-content/uploads/2015/11/bgimg3.jpg);
    background-repeat: no-repeat;
    position: absolute;
    width: 100%;
    height: 100%;
}

#title-card { 
    font-family: monospace;
    width: auto;
    min-height: 300px;
	background-color: transparent;
	padding-bottom: 10px;
	padding-top: 20%;
	padding-left: 4%;
	margin-top: -2%;
	padding-right: 2%;
}

#title-card h1{
    width: auto;
	font-weight: bold;
	text-align: center;
	font-size: 300%;
	color:black;
    
}

#table a{
    text-decoration: none;
    cursor: pointer;
    color: black; 
}

td:hover{
    background-color: gray;
}

td, th {
    border-radius: 10px;
}

#title-card a{
	font-size: 150%;
	padding-left: 30px;
	padding-bottom: 5px;
	color: black;
	float: right;
	cursor: pointer;
}

table {
    border-color: transparent;
    font-family: monospace;
    font-size: 170%;
    text-align: left;
    margin-left: 4%;
    width: 90%;
    color: black;
    
}

#login{
    text-align: center;
    font-size: 200%;
    font-family: monospace;
    position: absolute;
    color: black;
    padding-top: 10%;

    float: left;
}
 </style>


@section('content')
<body>
        

        <div id = "container">
            <div id = "login">
                <h1><b>Welcome to Uni-Threads!</b></h1>  <!-- I imagine we would want both of these lines centered for this page -->
                <h3>A private forum for university students to learn from and help each other<h3>
           
            @if(Auth::guest())
            <div id = "buttons">
                <a href="/register" class="btn btn-default">Sign Up</a> <a href="/login" class="btn btn-default">Log in</a> <!-- These buttons need to be styled. -->
            </div>
            @endif

            @if(Auth::user())
            <div id = "buttons">
                <a href="/subjects" class="btn btn-default">Subjects</a> <a href="/profile" class="btn btn-default">Profile</a> <!-- These buttons need to be styled. -->
            </div>
            @endif
            <!-- I'm going to leave it to dallen or ela to format the page so the buttons appear separate from the proceeding line. -->

            <div id = "unimail">
                <small>Please sign up with your university email to access the forums and check the spam folder!</small>
            </div>
        <!-- If anybody thinks the wording on this page should be redone please feel free to do it and just add a comment with date/times of update and who it was by just so we can keep track-->
        </div>
         </div>

        </body>

@endsection