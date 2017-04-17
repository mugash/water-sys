@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Settings</div>
                    <div class="panel-body">
                        <h1 class="text-center">Update System settings</h1>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('settings-store') }}">
                        {{ csrf_field() }}
                            <input type="hidden" value="{{$settings->id}}" name="id" id="id">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Price Per Unit</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control" name="price"
                                           value="{{ $settings->price_per_unit }}" required autofocus>

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Settings
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