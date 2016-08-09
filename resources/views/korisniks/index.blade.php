<!-- /resources/views/korisniks/index.blade.php -->
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
			<h1>Korisnici</h1>
		</div>
	@if(!$korisniks->count())
		Prazno
	@else
		<ul>
			@foreach($korisniks as $korisnik)
				<li><a href="{{ route('korisniks.show', $korisnik->ime)}}">{{ $korisnik->ime }}</a></li>
			@endforeach
		</ul>
	@endif

	</div>
</div>

</body>
</html>

@endsection