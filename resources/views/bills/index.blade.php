@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Bills
                        <a href="{{ route('client_create') }}" class="pull-right">Record a new bill</a> </div>

                    <div class="panel-body">
                        <h1 class="text-center">Unpaid Bills</h1>
                        <table class="table table-condensed">
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Meter Number</th>
                                <th>Meter Reading</th>
                                <th>Bill Number</th>
                                <th>Amount</th>
                                <th>Deadline</th>
                                <th>Balance</th>
                            </tr>
                            @foreach($bills as $bill)
                                <tr>
                                    <td><a href="{{ route('client-detail', ['bill' => $bill->id]) }}"> {{ $bill->id }}</a></td>
                                    <td>{{$bill->meter_reading->client->first_name }} {{ $bill->meter_reading->client->last_name }}</td>
                                    <td>{{ $bill->meter_reading->client->meter_number }}</td>
                                    <td>{{$bill->meter_reading->reading}} units</td>
                                    <td>{{ $bill->number }}</td>
                                    <td>Ksh. {{ $bill->amount }}</td>
                                    <td>{{ $bill->deadline }}</td>
                                    <td>Ksh. {{ $bill->balance }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection