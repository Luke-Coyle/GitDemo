<!--Contains welcome page where content is more spread out (Less appealing view). -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     

 <style>
#container{
    width: 100%;
    height: 100%;
}

#reg{

    font-family:monospace;
    opacity:0.7;
    color:black;
}

#pbody{
    font-family:monospace;
    opacity:0.7;
    color:black;
    width:60%;
    float:right;

}

#cbody{
    font-family:monospace;
    opacity:0.7;
    color:black;
    width:60%;

}

#post{
font-family:monospace;
    opacity:0.9;
    color:black;
    font-size:150%;

}

body{
    background-image: url(https://thebestscreenprinting.com/wp-content/uploads/2015/11/bgimg3.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    position: absolute;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    width: 100%;
    height: 100%x;
}

#title-card { 
    font-family: monospace;
    width: auto;
    min-height: 300px;
	background-color: transparent;
	padding-bottom: 2px;
	padding-top: 10%;
	padding-left: 4%;
	margin-top: -2%;
	padding-right: 2%;
}

#title-cardA { 
    font-family: monospace;
    width: auto;
    min-height: 300px;
	background-color: transparent;

	padding-top: 10%;
	padding-left: 4%;

	padding-right: 2%;
}

#image{
    float:left;
  width:40%;
   padding-bottom:3%;
}

#postbody{

  
   
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
 </style>

</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <div class = "container">
        
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
