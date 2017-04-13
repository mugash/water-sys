@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Client</div>
                    <div class="panel-body">
                        <h1 class="text-center">Edit Client</h1>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('save-client', ['client' => $client->id]) }}">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{$client->id}}" name="id" id="id">
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control"  name="first_name" value="{{$client->first_name}}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{$client->last_name}}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{$client->phone_number}}" required autofocus>

                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('plot_number') ? ' has-error' : '' }}">
                                <label for="plot_number" class="col-md-4 control-label">Plot Number</label>

                                <div class="col-md-6">
                                    <input id="plot_number" type="number" class="form-control" name="plot_number" value="{{$client->plot_number}}" required autofocus>

                                    @if ($errors->has('plot_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('plot_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{$client->address}}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('meter_number') ? ' has-error' : '' }}">
                                <label for="meter_number" class="col-md-4 control-label">Meter Number</label>

                                <div class="col-md-6">
                                    <input id="meter_number" type="number" class="form-control" name="meter_number" value="{{$client->meter_number}}" required autofocus>

                                    @if ($errors->has('meter_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('meter_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edit Client
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