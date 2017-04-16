@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$reading->client->first_name}} {{$reading->client->last_name}} meter reading details</div>
                    <div class="panel-body">
                        <h1 class="text-center">{{$reading->client->first_name}} {{$reading->client->last_name}} meter reading details</h1>
                        <p><b>Client:</b><a href="{{ route('client-detail',  ['client' => $reading->client->id]) }}"> {{$reading->client->first_name}} {{$reading->client->last_name}} </a></p>
                        <p><b>Read Date:</b> {{$reading->read_date}}</p>
                        <p><b>Reading:</b> {{$reading->reading}}</p>
                        <a href="{{ route('meter_reading_edit', ['reading' => $reading->id]) }}">Edit Meter Reading</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection