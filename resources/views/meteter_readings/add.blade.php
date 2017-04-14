@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Record a Meter Reading</div>
                    <div class="panel-body">
                        <h1 class="text-center">Record a Meter Reading</h1>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('meter_reading_store') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
                                <label for="client_id" class="col-md-4 control-label">Client</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="client_id">
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->first_name}} {{$client->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('read_date') ? ' has-error' : '' }}">
                                <label for="read_date" class="col-md-4 control-label">Read Date</label>

                                <div class="col-md-6">
                                    <input id="read_date" type="date" class="form-control" name="read_date"
                                           value="{{ old('read_date') }}" required autofocus>

                                    @if ($errors->has('read_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('read_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('reading') ? ' has-error' : '' }}">
                                <label for="reading" class="col-md-4 control-label">Reading</label>

                                <div class="col-md-6">
                                    <input id="reading" type="number" class="form-control" name="reading"
                                           value="{{ old('reading') }}" required autofocus>

                                    @if ($errors->has('reading'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reading') }}</strong>
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