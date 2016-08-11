@extends('layouts.app')

@section('content')
    <ul>

        
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">

                        <div class="panel-heading"> Oalala </div>

                            <div class="panel-body">
                                @foreach($users as $userN)
                                @if($id == $userN->id)
                                <li>Name: {{ $userN->ime }}</li>
                                @endif
                                 @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </ul>


@endsection