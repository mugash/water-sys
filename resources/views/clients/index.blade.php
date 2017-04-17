@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Clients
                    <a href="{{ route('client_create') }}" class="pull-right">Add a new client</a> </div>

                    <div class="panel-body">
                        <h1 class="text-center">Here are all the clients</h1>
                        <table class="table table-condensed">
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>phone Number</th>
                                <th>Plot Number</th>
                                <th>clients_address</th>
                                <th>Meter Number</th>
                            </tr>
                            @foreach($clients as $client)
                            <tr>
                                    <td><a href="{{ route('client-detail', ['client' => $client->id]) }}"> {{ $client->id }}</a></td>
                                    <td>{{$client->clients_first_name }}</td>
                                    <td>{{$client->clients_last_name }}</td>
                                    <td>{{ $client->clients_phone_number }}</td>
                                    <td>{{ $client->clients_plot_number }}</td>
                                    <td>{{ $client->clients_address }}</td>
                                    <td>{{ $client->clients_meter_number }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection