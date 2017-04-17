@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Meter Readings
                        <a href="{{ route('meter_reading_add') }}" class="pull-right">Record a Meter Reading</a> </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('meter_reading_by_meter_by_form') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('meter_number') ? ' has-error' : '' }}">
                                        <label for="meter_number" class="col-md-4 control-label">Find readings by Meter number</label>
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
                                                Find Meter Readings
                                            </button>
                                        </div>
                                    </div>
                                    <form>
                            </div>
                        </div>
                        <h1 class="text-center">Meter Readings with clients</h1>
                        <table class="table table-condensed">
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Meter Number</th>
                                <th>Read Date</th>
                                <th>Reading</th>
                            </tr>
                            @foreach($meter_readings as $reading)
                                <tr>
                                    <td><a href="{{ route('meter_reading', ['reading' => $reading->id]) }}"> {{$reading->id}}</a></td>
                                    <td><a href="{{ route('client-detail', ['client' => $reading->client->id]) }}">{{$reading->client->first_name}} {{$reading->client->last_name}}</a></td>
                                    <td>{{ $reading->client->clients_meter_number }}</td>
                                    <th>{{$reading->meter_read_date}}</th>
                                    <th>{{$reading->meter_reading}}</th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection