@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <!-- IME -->
                        <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
                            <label for="ime" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="ime" type="text" class="form-control" name="ime" value="{{ old('ime') }}">

                                @if ($errors->has('ime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- PREZIME -->
                        <div class="form-group{{ $errors->has('prezime') ? ' has-error' : '' }}">
                            <label for="prezime" class="col-md-4 control-label">Surname</label>

                            <div class="col-md-6">
                                <input id="prezime" type="text" class="form-control" name="prezime" value="{{ old('prezime') }}">

                                @if ($errors->has('prezime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prezime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- MOBITEL -->
                        <div class="form-group{{ $errors->has('mobitel') ? ' has-error' : '' }}">
                            <label for="mobitel" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="mobitel" type="text" class="form-control" name="mobitel" value="{{ old('mobitel') }}">

                                @if ($errors->has('mobitel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobitel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <!-- DATUM RODENJA -->
                        <div class="form-group{{ $errors->has('datum_rodenja') ? ' has-error' : '' }}">
                            <label for="datum_rodenja" class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="datum_rodenja" type="date" class="form-control" name="datum_rodenja" value="{{ old('datum_rodenja') }}">

                                @if ($errors->has('datum_rodenja'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datum_rodenja') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <!-- EMAIL -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- PASSWORD -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- PASSWORD CONFIRMATION -->
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
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
