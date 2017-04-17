@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Bills
                        <a href="{{ route('bills_add') }}" class="pull-right">Record a new bill</a> </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('meter_reading_store') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('meter_number') ? ' has-error' : '' }}">
                                        <label for="meter_number" class="col-md-4 control-label">Find bills by Meter number</label>
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                <input id="meter_number" type="number" class="form-control" name="meter_number"
                                                       value="{{ old('meter_number') }}" required autofocus>

                                                @if ($errors->has('meter_number'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('meter_number') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Find Bills
                                            </button>
                                        </div>
                                    </div>
                                    <form>
                            </div>
                        </div>
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
                                    <td><a href="{{ route('bill', ['bill' => $bill->id]) }}"> {{ $bill->id }}</a></td>
                                    <td>{{$bill->meter_reading->client->clients_first_name }} {{ $bill->meter_reading->client->clients_last_name }}</td>
                                    <td>{{ $bill->meter_reading->client->clients_meter_number }}</td>
                                    <td>{{$bill->meter_reading->meter_reading}} units</td>
                                    <td>{{ $bill->bill_number }}</td>
                                    <td>Ksh. {{ $bill->bill_amount }}</td>
                                    <td>{{ $bill->bill_deadline }}</td>
                                    <td>Ksh. {{ $bill->bill_balance }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection