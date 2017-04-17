@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$bill->meter_reading->client->clients_first_name}} {{$bill->meter_reading->client->clients_last_name}} bill details</div>
                    <div class="panel-body">
                        <h1 class="text-center">{{$bill->meter_reading->client->clients_first_name}} {{$bill->meter_reading->client->clients_last_name}} bill details</h1>
                        <p><b>Client:</b><a href="{{ route('client-detail',  ['client' => $bill->meter_reading->client->id]) }}"> {{$bill->meter_reading->client->clients_first_name}} {{$bill->meter_reading->client->clients_last_name}} </a></p>
                        <p><b>Meter Number: </b> {{$bill->meter_reading->client->clients_meter_number}}</p>
                        <p><b>Meter Reading: </b> {{$bill->meter_reading->meter_reading}}</p>
                        <p><b>Bill Number: </b>{{$bill->bill_number}}</p>
                        <p><b>Amount: </b>{{$bill->bill_amount}}</p>
                        <p><b>Deadline: </b>{{$bill->bill_deadline}}</p>
                        <p><b>Balance: </b>{{$bill->bill_balance}}</p>
                        <a href="{{ route('bill_edit', ['reading' => $bill->id]) }}">Edit Bill</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection