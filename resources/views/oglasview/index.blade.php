@extends('layouts.app')

@section('content')

	<ul>
		@foreach($oglas as $oglasN)
			<div class="container">
    			<div class="row">
       				<div class="col-md-8 col-md-offset-2">
            			<div class="panel panel-default">
                			<div class="panel-heading"><a href = "{{ route('oglas.show', [$oglasN->id]) }}"> {{ $oglasN->naslov }}</a></div>
                				<div class="panel-body">
									<textarea disabled="" class="form-control" style="min-width: 100%"> Description: {{ $oglasN->opis }} </textarea>
									<li>Region: {{ $oglasN->regija }}</li>
									<li>Price: {{ $oglasN->cijena_mjesec }} €/month</li>
									<li>Accomodation Type: {{ $oglasN->smjestaj }}</li>
									@if($oglasN->soba == 0)
										<li>Only Room?: No
									@else
										<li>Only Room?: Yes
									@endif
									<li>Created at: {{ $oglasN->created_at }}
								</div>
            				</div>
        				</div>
    				</div>
     			</div>
			</div>
		@endforeach	
	</ul>

@endsection