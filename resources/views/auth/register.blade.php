@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register a new user</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('users_first_name') ? ' has-error' : '' }}">
                            <label for="users_first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="users_first_name" type="text" class="form-control" name="users_first_name" value="{{ old('users_first_name') }}" required autofocus>

                                @if ($errors->has('users_first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('users_first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('users_last_name') ? ' has-error' : '' }}">
                            <label for="users_last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="users_last_name" type="text" class="form-control" name="users_last_name" value="{{ old('users_last_name') }}" required autofocus>

                                @if ($errors->has('users_last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('users_last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('users_address') ? ' has-error' : '' }}">
                            <label for="users_address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="users_address" type="text" class="form-control" name="users_address" value="{{ old('users_address') }}" required autofocus>

                                @if ($errors->has('users_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('users_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('users_user_type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Register as:</label>

                            <div class="col-md-6">
                                @if ($errors->has('users_user_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('users_user_type') }}</strong>
                                    </span>
                                @endif
                                <select class="form-control" name="users_user_type" id="users_user_type">
                                    <option value="admin">Admin</option>
                                    <option value="agent">Agent</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
