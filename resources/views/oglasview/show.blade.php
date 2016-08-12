
<!-- HOME PAGE FOR CUSTOM USER -->

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
	                			<div class="panel-heading">{{ $oglasN->naslov }}</a></div>
	                				<div class="panel-body">
										<textarea disabled="" class="form-control" style="min-width: 100%">Description: {{ $oglasN->opis }} </textarea>
										<li>Region: {{ $oglasN->regija }}</li>
										<li>Price: {{ $oglasN->cijena_mjesec }}</li>
										<li>Accomodation Type: {{ $oglasN->smjestaj }}</li>
										@if($oglasN->soba == 0)
											<li>Only Room?: No
										@else
											<li>Only Room?: Yes
										@endif
										<li>Created at: {{ $oglasN->created_at }}

										


										
	                   					{{ Form::open(['route' => ['oglasview.destroy', $oglasN->id], 'method' => 'delete']) }}
	                   						
	                   							<!-- BUTTON 1-->
	                        					<div class="col-md-6 col-md-offset-4">
	                            					{{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
	                        					</div>
	                   					{{ Form::close() }}

	                   					

	                   					
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