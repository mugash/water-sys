@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$payment->billing->meter_reading->client->first_name}} {{$payment->billing->meter_reading->client->last_name}} Payments details</div>
                    <div class="panel-body">
                        <h1 class="text-center">{{$payment->billing->meter_reading->client->first_name}} {{$payment->billing->meter_reading->client->last_name}} Payments details</h1>
                        <p><b>Bill Number:</b>{{$payment->billing->number}}</p>
                        <p><b>payment_amount: </b> {{$payment->payment_amount}}</p>
                        <p><b>Date: </b> {{$payment->payment_date}}</p>
                        <p><b>Type: </b>{{$payment->payment_type}}</p>
                        <a href="#">Edit Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection