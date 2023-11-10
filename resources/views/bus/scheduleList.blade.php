@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Bus Schedule List</h3>
        </div>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Bus Name</th>
                <th scope="col">Route Name</th>
                <th scope="col">Departure Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{$schedule->id}}</td>
                    <td>{{$schedule->bus->name}}</td>
                    <td>{{$schedule->bus->bus_route->name}}</td>
                    <td>{{$schedule->departure_time}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $schedules->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@endsection()
