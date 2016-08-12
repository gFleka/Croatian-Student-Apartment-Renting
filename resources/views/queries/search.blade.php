
<!-- QUERIES/SEARCH -->

@extends('layouts.app')

@section('content')

<head>
	<link rel="stylesheet" type="text/css" href = "search.css">
</head>

<ul>
	<div class="container">
    	<div class="row">
       		<div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">
                	
                	@if(count($hits) == 0)
                		<div class="panel-heading"> There are no Active Advertisements consisting word <b>"{{ $query }}"</b> </div>
                			
                			@else
                				<div class="panel-heading"> We found <b>{{ count($hits) }}</b> Advertisements consisting word<b>"{{ $query }}"</b></div>
                				@foreach($hits as $oglasN)
                					<div class="panel-heading"> <a href = "{{ route('oglas.show', [$oglasN->id]) }}"> {{ $oglasN->naslov }} </a></div>
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
                					@endforeach
                			@endif
                		
            		</div>
        		</div>
    		</div>
     	</div>
	</div>

</ul>
@endsection
