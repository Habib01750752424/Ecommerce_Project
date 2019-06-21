<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
<p class="texto">Register Form</p>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: white; font-size: 15px;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<p class="alert-success">
    <?php
    $message=Session::get('message');
    if ($message) {

      ?><h2 style="color: white; font-size: 15px;"><?PHP echo $message; ?></h2><?php
      Session::put('message',null);
    }

    ?>
</p> 

<div class="Registro">
<form method="post" action="{{url('/register')}}">
    {{ csrf_field() }}
	<span class="fontawesome-user"></span>
	<input type="text" placeholder="Enter Full Name" name="name"> 
	<span class="fontawesome-envelope-alt"></span>
	<input type="text" id="email" placeholder="Enter Your Email" name="email">
	<span class="fontawesome-lock"></span>
	<input type="password" name="password" id="password" placeholder="Enter password"> 
	<input type="submit" value="Registrar">
</form>


<h2 style="color: white;">After Registration:&nbsp<a href="{{URL::to('/login-user')}}" style="color: #d3d015; text-decoration: none;">Now LogIn</a></h2>


</body>
</html>