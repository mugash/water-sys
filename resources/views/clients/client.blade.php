@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$client->clients_first_name}} {{$client->clients_last_name}} details</div>
                    <div class="panel-body">
                        <h1 class="text-center">{{$client->clients_first_name}} {{$client->clients_last_name}} details</h1>
                        <p><b>First Name:</b> {{$client->clients_first_name}}</p>
                        <p><b>Last Name:</b> {{$client->clients_last_name}}</p>
                        <p><b>Phone Number:</b> {{$client->clients_phone_number}}</p>
                        <p><b>Plot Number:</b> {{$client->clients_plot_number}}</p>
                        <p><b>clients_address:</b> {{$client->clients_address}}</p>
                        <p><b>Meter Number:</b> {{$client->clients_meter_number}}</p>
                        <a href="{{ route('edit', ['client' => $client->id]) }}">Edit Member</a>
                        <a href="{{ route('destroy', ['client' => $client->id]) }}">Delete Member</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection