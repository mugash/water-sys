@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Record Bill</div>
                    <div class="panel-body">
                        <h1 class="text-center">Record Bill</h1>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('bills_store') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('meter_reading_id') ? ' has-error' : '' }}">
                                <label for="meter_reading_id" class="col-md-4 control-label">Meter Reading</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="meter_reading_id">
                                        @foreach($readings as $reading)
                                            <option value="{{$reading->id}}">{{$reading->client->first_name}} {{$reading->client->last_name}} {{$reading->reading}} units</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Price Per Unit</label>

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
                            <div class="form-group{{ $errors->has('deadline') ? ' has-error' : '' }}">
                                <label for="deadline" class="col-md-4 control-label">Deadline to pay bill</label>

                                <div class="col-md-6">
                                    <input id="deadline" type="date" class="form-control" name="deadline"
                                           value="{{ old('deadline') }}" required autofocus>

                                    @if ($errors->has('deadline'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('deadline') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Record Bill
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