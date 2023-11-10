@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Register Bus</h3>
        </div>
        <form action="{{ url('/register-bus') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">Bus Name</label>
                    <input type="text" class="form-control" name="bus_name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">License Number</label>
                    <input type="text" class="form-control" name="license_number">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Chassis Number</label>
                    <input type="text" class="form-control" name="chassis_number">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Bus Route</label>
                    <select name="bus_route_id" class="form-control">
                        <option></option>
                        @foreach($busRoutes as $busRoute)
                            <option value="{{$busRoute->id}}">{{$busRoute->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if ($errors->any())
                <div class="row mt-2">
                    <div class="alert alert-danger col-md-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="row mt-2">
                <div class="col-md-3">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
