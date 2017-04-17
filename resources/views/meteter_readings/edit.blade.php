@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Meter Reading
                        <a href="{{ route('meter_reading_add') }}" class="pull-right">Record Meter Reading & Generate Bill</a></div>
                    <div class="panel-body">
                        <h1 class="text-center">Update Meter Reading</h1>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('meter_reading_update') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $reading->id }}">
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
                                           value="{{ $reading->meter_read_date }}" required autofocus>

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
                                           value="{{ $reading->meter_reading }}" required autofocus>

                                    @if ($errors->has('meter_reading'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('meter_reading') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Meter Reading
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