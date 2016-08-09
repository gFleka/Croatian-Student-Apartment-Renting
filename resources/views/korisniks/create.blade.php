<!-- /resources/views/korisniks/create.blade.php -->
@extends('app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<meta name="description" content="">
	<meta name="keywords" content="">
</head>

<body class = "container">

	
<div class = "row">
	<div class = "col-sm-8 col-sm-offset-2">

		<div class = "page-header">
			<h1>Register</h1>
		</div>

		@if ($errors->has())
		<div class = "alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }}<br>
			@endforeach
		</div>
		@endif
	
		{{ Form::open(array('url' => 'korisniks')) }}

			<div class = "form-group">
				{{ Form::label('ime', 'Ime') }}
				{{ Form::text('ime', Input::old('ime'), array('class' => 'form-control')) }}
			</div>

			<div class = "form-group">
				{{ Form::label('prezime', 'Prezime') }}
				{{ Form::text('prezime', Input::old('prezime'), array('class' => 'form-control')) }}
			</div>

			<div class = "form-group">
				{{ Form::label('mobitel', 'Broj Mobitela') }}
				{{ Form::text('mobitel', Input::old('mobitel'), array('class' => 'form-control')) }}
			</div>
			
			<div class = "form-group">
				{{ Form::label('datum_rodenja', 'Datum Rodenja') }}
				{{ Form::date('datum_rodenja', Input::old('datum_rodenja'), array('class' => 'form-control')) }}
			</div>

			<div class = "form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
			</div>

			<div class = "form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', Input::old('password'), array('class' => 'form-control')) }}
			</div>

			<div class = "form-group">
				{{ Form::label('password_confirmation', 'Confirm Password') }}
				{{ Form::password('password_confirmation', Input::old('password_confirmation'), array('class' => 'form-control')) }}
			</div>

			{{ Form::submit('Submit!', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}


	</div>
</div>

</body>
</html>

@endsection