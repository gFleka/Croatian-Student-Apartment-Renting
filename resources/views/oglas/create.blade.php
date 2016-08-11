@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Accomodation Form</div>
                <div class="panel-body">

                    <!-- OPEN FORM -->
                    {{ Form::open(array('url' => 'oglas')) }}
                        
                        <!-- NASLOV -->
                        <div class="form-group{{ $errors->has('naslov') ? ' has-error' : '' }}">
                            {{Form::label('naslov', 'Title', array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::text('naslov', Input::old('naslov'), array('class' => 'form-control')) }}
                               
                                @if ($errors->has('naslov'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('naslov') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- OPIS -->
                        <div class="form-group{{ $errors->has('opis') ? ' has-error' : '' }}">
                            {{ Form::label('opis', 'Description', array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::textarea('opis', Input::old('opis'), array('class' => 'form-control')) }}

                                @if ($errors->has('opis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('opis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <!-- CIJENA MJESEC -->
                        <div class="form-group{{ $errors->has('cijena_mjesec') ? ' has-error' : '' }}">
                            {{ Form::label('cijena_mjesec', 'Price', array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::text('cijena_mjesec', Input::old('cijena_mjesec'), array('class' => 'form-control')) }}

                                @if ($errors->has('cijena_mjesec'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cijena_mjesec') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <!-- SLIKA -->
                        <div class="form-group{{ $errors->has('photo_url') ? ' has-error' : '' }}">
                            {{ Form::label('photo_url', 'Photo URL', array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::text('photo_url', Input::old('photo_url'), array('class' => 'form-control')) }}

                                @if ($errors->has('photo_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- REGIJA -->
                        <div class="form-group{{ $errors->has('regija') ? ' has-error' : '' }}">
                            {{ Form::label('regija', 'Region', array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                            {{ Form::select('regija', [
                                'pula'              => 'Pula',
                                'rijeka'            => 'Rijeka',
                                'sibenik'           => 'Šibenik',
                                'zadar'             => 'Zadar',
                                'split'             => 'Split',
                                'dubrovnik'         => 'Dubrovnik',
                                'karlovac'          => 'Karlovac',
                                'zagreb'            => 'Zagreb',
                                'varazdin'          => 'Varaždin',
                                'osijek'            => 'Osijek',
                                'slavonski_brod'    => 'Slavonski Brod',
                                'vukovar'           => 'Vukovar']
                            ) }}

                                @if ($errors->has('regija'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('regija') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- SMJESTAJ -->
                        <div class="form-group{{ $errors->has('smjestaj') ? ' has-error' : '' }}">
                            {{ Form::label('smjestaj', 'Accomodation', array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::radio('smjestaj', 'Apartment') }}Apartment<br>
                                {{ Form::radio('smjestaj', 'House') }} House

                                @if ($errors->has('smjestaj'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('smjestaj') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- SOBA -->
                        <div class="form-group{{ $errors->has('soba') ? ' has-error' : '' }}">
                             {{ Form::label('soba', 'Only Room?', array('class' => 'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::radio('soba', 'Yes') }}Yes<br>
                                {{ Form::radio('soba', 'No') }} No

                                @if ($errors->has('soba'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('soba') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                        </div>
                        
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
