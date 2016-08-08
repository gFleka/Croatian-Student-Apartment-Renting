<!-- /resources/views/korisniks/create.blade.php -->

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
	
		<form method = "POST" action = "/korisnik/created" novalidate>

			<div class = "form-group">
				<label for = "name"> Ime </label>
				<input type = "text" id = "name" class = "form-control" name = "name" placeholder = "Ime">
			</div>

			<div class = "form-group">
				<label for = "surname"> Prezime </label>
				<input type = "text" id = "surname" class = "form-control" name = "surname" placeholder = "Prezime">
			</div>

			<div class = "form-group">
				<label for = "mobile"> Broj telefona </label>
				<input type = "text" id = "usermobile" class = "form-control" name = "usermobile" placeholder = "Broj Telefona">
			</div>
			
			<div class = "form-group">
				<label for = "dateofbirth"> Datum rodenja </label>
				<input type = "date" id = "dateofbirth" class = "form-control" name = "dateofbirth" placeholder = "DD/MM/YYYY">
			</div>

			<div class = "form-group">
				<label for = "email"> Email </label>
				<input type = "email" id = "email" class = "form-control" name = "email" placeholder = "example@ria.com">
			</div>

			<div class = "form-group">
				<label for = "password"> Password </label>
				<input type = "password" id = "password" class = "form-control" name = "password" placeholder = "Password">
			</div>

			<div class = "form-group">
				<label for = "passwordconfirm"> Password Confirm </label>
				<input type = "password" id = "passwordconfirm" class = "form-control" name = "passwordconfirm" placeholder = "Confirm Password">
			</div>

			<button type = "submit" class = "btn btn-success"> Submit! </button>

		</form>


	</div>
</div>

</body>
</html>

