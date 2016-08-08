<!-- /resources/views/oglas/show.blade.php -->

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
			<h2> {!! link_to_route('korisniks.show', $korisnik->ime) !!} - {{ $oglas->naslov }} </h2>
		</div>
		{{ $oglas->tekst }}
	</div>
</div>

</body>
</html>

@endsection