@extends('layouts.app')

@section('content')

	<ul>
		{{-- */$currentUser = Auth::user()->id;/* --}}
		@foreach($oglas as $oglasN)
			@if($currentUser == $oglasN->user_id)
			<div class="container">
    			<div class="row">
       				<div class="col-md-8 col-md-offset-2">
            			<div class="panel panel-default">
                			<div class="panel-heading"><a href = "{{ route('oglas.show', [$oglasN->id]) }}"> {{ $oglasN->naslov }}</a></div>
                				<div class="panel-body">
									<li>Description: {{ $oglasN->opis }}</li>
									<li>Region: {{ $oglasN->regija }}</li>
									<li>Price: {{ $oglasN->cijena_mjesec }}</li>
									<li>Accomodation Type: {{ $oglasN->smjestaj }}</li>
									@if($oglasN->soba == 0)
										<li>Only Room?: No
									@else
										<li>Only Room?: Yes
									@endif
								</div>
            				</div>
        				</div>
    				</div>
     			</div>
			</div>
		@endif
		@endforeach	
	</ul>

@endsection