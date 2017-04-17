@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Record a Meter Reading and Generate a bill
                        <a href="{{ route('meter_reading_add') }}" class="pull-right">Record Meter Reading</a></div>
                    <div class="panel-body">
                        <h1 class="text-center">Record a Meter Reading and Generate Bill</h1>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('meter_reading_store_bill') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
                                <label for="client_id" class="col-md-4 control-label">Client</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="client_id">
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->clients_first_name}} {{$client->clients_last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('meter_read_date') ? ' has-error' : '' }}">
                                <label for="meter_read_date" class="col-md-4 control-label">Read Date</label>

                                <div class="col-md-6">
                                    <input id="meter_read_date" type="date" class="form-control" name="meter_read_date"
                                           value="{{ old('meter_read_date') }}" required autofocus>

                                    @if ($errors->has('meter_read_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('meter_read_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('meter_reading') ? ' has-error' : '' }}">
                                <label for="meter_reading" class="col-md-4 control-label">meter_reading</label>

                                <div class="col-md-6">
                                    <input id="meter_reading" type="number" class="form-control" name="meter_reading"
                                           value="{{ old('meter_reading') }}" required autofocus>

                                    @if ($errors->has('meter_reading'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('meter_reading') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Price per Unit</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control" name="price"
                                           value="{{ old('price') }}" required autofocus>

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('bill_deadline') ? ' has-error' : '' }}">
                                <label for="bill_deadline" class="col-md-4 control-label">Deadline to pay bill</label>

                                <div class="col-md-6">
                                    <input id="bill_deadline" type="date" class="form-control" name="bill_deadline"
                                           value="{{ old('bill_deadline') }}" required autofocus>

                                    @if ($errors->has('bill_deadline'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bill_deadline') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Record Meter Reading
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