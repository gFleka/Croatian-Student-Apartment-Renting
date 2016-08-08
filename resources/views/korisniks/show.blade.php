<!-- /resources/views/korisniks/show.blade.php -->

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
			<h1>Dobrodosao</h1>
			<h2>{{ $korisnik->ime }}</h2>
		</div>
		@if(!$korisnik->oglas->count())
			Prazno
		@else
			Puno
			<ul>
				@foreach($korisnik->oglas as $oglas)
					<li><a href = "{{ route('korisniks.oglas.show') }}"> {{ $oglas->naslov }}</a></li>
				@endforeach
			</ul>
		@endif
	</div>
</div>

</body>
</html>

@endsection