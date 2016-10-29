@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bus Stops</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Distance</th>
                        </tr>
                    </thead>
                    @foreach ($busStops as $busStop)
                    <tbody>
                        <tr>
                            <td>{{$busStop->name}}</td>
                            <td>{{$busStop->description}}</td>
                            <td>{{round($busStop->distanceFromUser, 2)}} km.</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
