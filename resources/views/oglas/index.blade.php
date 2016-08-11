@extends('layouts.app')

@section('content')


	<ul>
		@foreach($oglas as $oglasN)
			<div class="container">
    			<div class="row">
       				<div class="col-md-8 col-md-offset-2">
            			<div class="panel panel-default">
                			<div class="panel-heading"><a href = "{{ url('/oglas') }}"> {{ $oglasN->naslov }}</a></div>
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
		@endforeach	
	</ul>

@endsection