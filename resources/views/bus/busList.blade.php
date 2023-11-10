@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Bus List</h3>
            </div>
            <div class="col-md-6">
                <a class="btn btn-primary float-end" href="{{ route('bus.register.ui') }}">Register Bus + </a>
            </div>
        </div>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Bus Name</th>
                <th scope="col">License Number</th>
                <th scope="col">Chassis Number</th>
                <th scope="col">Route Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($buses as $bus)
                <tr>
                    <th scope="row">{{ $bus->id }}</th>
                    <td>{{$bus->name}}</td>
                    <td>{{$bus->license_number}}</td>
                    <td>{{$bus->chassis_number}}</td>
                    <td>{{$bus->bus_route->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $buses->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>

@endsection
