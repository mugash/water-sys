@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Pay Bill</div>
                        <div class="panel-body">
                            <h1 class="text-center">Pay Bill</h1>
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('payments_add_store') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('billing_id') ? ' has-error' : '' }}">
                                    <label for="billing_id" class="col-md-4 control-label">Bill</label>
                                    @if ($errors->has('billing_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('billing_id') }}</strong>
                                    </span>
                                    @endif
                                    <div class="col-md-6">
                                        <select class="form-control" name="billing_id">
                                            @foreach($bills as $bill)
                                                <option value="{{$bill->id}}">{{$bill->meter_reading->client->clients_first_name}} {{$bill->meter_reading->client->clients_last_name}} number {{$bill->bill_number}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('payment_amount') ? ' has-error' : '' }}">
                                    <label for="payment_amount" class="col-md-4 control-label">payment_amount</label>

                                    <div class="col-md-6">
                                        <input id="payment_amount" type="number" class="form-control" name="payment_amount"
                                               value="{{ old('payment_amount') }}" required autofocus>

                                        @if ($errors->has('payment_amount'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('payment_amount') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('payment_date') ? ' has-error' : '' }}">
                                    <label for="payment_date" class="col-md-4 control-label">Payment Date</label>

                                    <div class="col-md-6">
                                        <input id="payment_date" type="date" class="form-control" name="payment_date"
                                               value="{{ old('payment_date') }}" required autofocus>

                                        @if ($errors->has('payment_date'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('payment_date') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('payment_type') ? ' has-error' : '' }}">
                                    <label for="payment_type" class="col-md-4 control-label">Payment Type</label>

                                    <div class="col-md-6">
                                        <input id="payment_type" type="text" class="form-control" name="payment_type"
                                               value="{{ old('payment_type') }}" required autofocus>

                                        @if ($errors->has('payment_type'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('payment_type') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Pay Bill
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