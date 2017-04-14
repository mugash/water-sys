@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Meter Readings</div>
                    <div class="panel-body">
                        <h1 class="text-center">Meter Readings with clients</h1>
                        <table class="table table-condensed">
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Read Date</th>
                                <th>Reading</th>
                            </tr>
                            @foreach($meter_readings as $reading)
                                <tr>
                                    <td>{{$reading->id}}</td>
                                    <td><a href="{{ route('client-detail', ['client' => $reading->client->id]) }}">{{$reading->client->first_name}} {{$reading->client->last_name}}</a></td>
                                    <th>{{$reading->read_date}}</th>
                                    <th>{{$reading->reading}}</th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection