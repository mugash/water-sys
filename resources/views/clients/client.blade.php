@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$client->first_name}} {{$client->last_name}} details</div>
                    <div class="panel-body">
                        <h1 class="text-center">{{$client->first_name}} {{$client->last_name}} details</h1>
                        <p><b>First Name:</b> {{$client->first_name}}</p>
                        <p><b>Last Name:</b> {{$client->last_name}}</p>
                        <p><b>Phone Number:</b> {{$client->phone_number}}</p>
                        <p><b>Plot Number:</b> {{$client->plot_number}}</p>
                        <p><b>Address:</b> {{$client->address}}</p>
                        <p><b>Meter Number:</b> {{$client->meter_number}}</p>
                        <a href="#">Edit Member</a>
                        <a href="#">Delete Member</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection