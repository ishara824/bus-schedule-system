@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(Session::has('schedule-message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('schedule-message') }}</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Bus Schedule</h3>
            </div>
        </div>
        <form action="{{ url('/schedule-bus') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">Bus Name</label>
                    <select name="bus_id" class="form-control">
                        <option></option>
                        @foreach($buses as $bus)
                            <option value="{{$bus->id}}">{{$bus->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Departure Time</label>
                    <input type="time" class="form-control" name="departure_time">
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
                    <button type="submit" class="btn btn-primary">Schedule</button>
                </div>
            </div>
        </form>
    </div>
@endsection
