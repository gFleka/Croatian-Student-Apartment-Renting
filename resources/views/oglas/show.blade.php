@extends('layouts.app')

@section('content')
    <ul>

        
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">

                        @foreach($oglas as $oglasN)
                                @if($id == $oglasN->id)
                                     <?php $oglasUnique = $oglasN; ?>
                          
                                @endif
                            @endforeach
                            
                        @foreach($users as $userN)
                                @if($oglasUnique->user_id == $userN->id)
                                    <?php $userUnique = $userN; ?>
                                    
                                @endif
                            @endforeach

                            

                             <div class="panel-heading"> {{ $oglasUnique->naslov }} </div>

                                <div class="panel-body">
                                
                                    <li>Name: {{ $userUnique->ime }}</li>
                                    <li>Surname: {{ $userUnique->prezime }}</li>
                                    <li>Mobile Phone: {{ $userUnique->mobitel }}</li>
                                    <li>E-mail Address: {{ $userUnique->email }}</li>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </ul>


@endsection