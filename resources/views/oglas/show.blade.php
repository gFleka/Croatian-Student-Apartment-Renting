@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <!-- NASLOV -->
                        <div class="form-group{{ $errors->has('naslov') ? ' has-error' : '' }}">
                            <label for="naslov" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="naslov" type="text" class="form-control" name="naslov" value="{{ old('naslov') }}">

                                @if ($errors->has('naslov'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('naslov') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- TEKST -->
                        <div class="form-group{{ $errors->has('opis') ? ' has-error' : '' }}">
                            <label for="opis" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="opis" type="text" class="form-control" name="opis" value="{{ old('opis') }}">

                                @if ($errors->has('opis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('opis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <!-- CIJENA MJESEC -->
                        <div class="form-group{{ $errors->has('cijena_mjesec') ? ' has-error' : '' }}">
                            <label for="cijena_mjesec" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="cijena_mjesec" type="int" class="form-control" name="cijena_mjesec" value="{{ old('cijena_mjesec') }}">

                                @if ($errors->has('cijena_mjesec'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cijena_mjesec') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <!-- SLIKA 
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Adresa</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->


                        <!-- REGIJA -->
                        <div class="form-group{{ $errors->has('regija') ? ' has-error' : '' }}">
                            <label for="regija" class="col-md-4 control-label">Region</label>

                            <div class="col-md-6">
                             <select class = "form-control">
                                <option> Pula </option>
                                <option> Rijeka </option>
                                <option> Šibenik </option>
                                <option> Zadar </option>
                                <option> Split </option>
                                <option> Dubrovnik </option>
                                <option> Karlovac </option>
                                <option> Zagreb </option>
                                <option> Varaždin </option>
                                <option> Osijek </option>
                            </select>

                                @if ($errors->has('regija'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('regija') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
