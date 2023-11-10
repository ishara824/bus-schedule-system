
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Bus Route List</h3>
        </div>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Route Name</th>
                <th scope="col">Allocated Buses</th>
            </tr>
            </thead>
            <tbody>
            @foreach($busRoutes as $busRoute)
                <tr>
                    <th scope="row">{{ $busRoute->id }}</th>
                    <td>{{$busRoute->name}}</td>
                    <td></td>
                    @foreach($busRoute->buses as $bus)
                        <tr><td></td><td></td><td>{{$bus->name}}</td></tr>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $busRoutes->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>

@endsection
