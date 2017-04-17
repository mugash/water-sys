@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Bill
                        <div class="panel-body">
                            <h1 class="text-center">Update Bill</h1>
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('bill_store_update') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$bill->id}}">
                                <div class="form-group{{ $errors->has('meter_reading_id') ? ' has-error' : '' }}">
                                    <label for="meter_reading_id" class="col-md-4 control-label">Meter Reading</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="meter_reading_id">
                                            @foreach($readings as $reading)
                                                <option value="{{$reading->id}}">{{$reading->client->clients_first_name}} {{$reading->client->clients_last_name}} {{$reading->reading}} units</option>
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
                                <div class="form-group{{ $errors->has('bill_deadline') ? ' has-error' : '' }}">
                                    <label for="bill_deadline" class="col-md-4 control-label">Deadline to pay bill</label>

                                    <div class="col-md-6">
                                        <input id="bill_deadline" type="date" class="form-control" name="bill_deadline"
                                               value="{{$bill->bill_deadline}}" required autofocus>

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