<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
</head>
<body>
 
	<h1>Register</h1>
 
	{{-- Form start comment --}}
 
		{!! Form::open(array('url' => 'korisnik/createUser')) !!}
		    <p>			
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', null, array("placeholder" => "Enter your name")) }}
			</p>
 
		    <p>			
				{{ Form::label('email', 'E-Mail Address') }}
				{{ Form::email('email', null, array("placeholder" => "Enter your email")) }}
			</p>
 
		    <p>			
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password') }}
			</p>
 
		    <p>			
				{{ Form::submit('Sign Up') }}
			</p>
 
		{!! Form::close() !!}
 
	{{-- Form end comment --}}
 
</body>
</html>