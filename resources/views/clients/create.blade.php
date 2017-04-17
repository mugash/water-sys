@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Client</div>
                    <div class="panel-body">
                        <h1 class="text-center">Add A New Client</h1>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('client_store') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('clients_first_name') ? ' has-error' : '' }}">
                                <label for="clients_first_name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="clients_first_name" type="text" class="form-control" name="clients_first_name" value="{{ old('clients_first_name') }}" required autofocus>

                                    @if ($errors->has('clients_first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('clients_first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('clients_last_name') ? ' has-error' : '' }}">
                                <label for="clients_last_name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="clients_last_name" type="text" class="form-control" name="clients_last_name" value="{{ old('clients_last_name') }}" required autofocus>

                                    @if ($errors->has('clients_last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('clients_last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('clients_phone_number') ? ' has-error' : '' }}">
                                <label for="clients_phone_number" class="col-md-4 control-label">Phone Number</label>

                                <div class="col-md-6">
                                    <input id="clients_phone_number" type="text" class="form-control" name="clients_phone_number" value="{{ old('clients_phone_number') }}" required autofocus>

                                    @if ($errors->has('clients_phone_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('clients_phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('clients_plot_number') ? ' has-error' : '' }}">
                                <label for="clients_plot_number" class="col-md-4 control-label">Plot Number</label>

                                <div class="col-md-6">
                                    <input id="clients_plot_number" type="number" class="form-control" name="clients_plot_number" value="{{ old('clients_plot_number') }}" required autofocus>

                                    @if ($errors->has('clients_plot_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('clients_plot_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('clients_address') ? ' has-error' : '' }}">
                                <label for="clients_address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input id="clients_address" type="text" class="form-control" name="clients_address" value="{{ old('clients_address') }}" required autofocus>

                                    @if ($errors->has('clients_address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('clients_address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('clients_meter_number') ? ' has-error' : '' }}">
                                <label for="clients_meter_number" class="col-md-4 control-label">Meter Number</label>

                                <div class="col-md-6">
                                    <input id="clients_meter_number" type="number" class="form-control" name="clients_meter_number" value="{{ old('clients_meter_number') }}" required autofocus>

                                    @if ($errors->has('clients_meter_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('clients_meter_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Client
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