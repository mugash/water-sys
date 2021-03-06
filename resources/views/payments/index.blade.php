@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Payments
                        <a href="{{ route('payments_add') }}" class="pull-right">Pay a Bill</a> </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('payments_add') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('meter_number') ? ' has-error' : '' }}">
                                        <label for="meter_number" class="col-md-4 control-label">Find payments by bill number</label>
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
                                                Find Payments
                                            </button>
                                        </div>
                                    </div>
                                    <form>
                            </div>
                            <div class="col-md-6">
                                <h3>Import Payments From Database:</h3>
                                <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;">
                                    <a href="{{ url('bill-downloadExcel/xls') }}">
                                        <button class="btn btn-success btn-sm">Download Excel xls</button>
                                    </a>
                                    <a href="{{ url('bill-downloadExcel/xlsx') }}">
                                        <button class="btn btn-success btn-sm">Download Excel xlsx</button>
                                    </a>
                                    <a href="{{ url('bill-downloadExcel/csv') }}">
                                        <button class="btn btn-success btn-sm">Download CSV</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h1 class="text-center">Payments</h1>
                        <table class="table table-condensed">
                            <tr>
                                <th>#</th>
                                <th>Bill Number</th>
                                <th>payment_amount</th>
                                <th>Date</th>
                                <th>Type</th>
                            </tr>
                            @foreach($payments as $payment)
                                <tr>
                                    <td><a href="{{ route('payment', ['payment' => $payment->id]) }}"> {{ ++$index }}</a></td>
                                    <td><a href="{{ route('bill', ['bill' => $payment->billing->id]) }}"> {{$payment->billing->bill_number}}</a></td>
                                    <td>Ksh. {{ $payment->payment_amount }}</td>
                                    <td>{{$payment->payment_date}}</td>
                                    <td>{{ $payment->payment_type }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection