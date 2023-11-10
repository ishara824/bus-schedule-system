@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="card m-auto" style="width: 18rem;">
                    <div class="card-body text-center">
                        <p><img src="{{ asset('icons/icons8-bus-50.png') }}" alt="" width="100" height="100"></p>
                        <a href="{{ url('/buses') }}" class="btn btn-primary">Bus</a>
                    </div>
                </div>
                <div class="card m-auto" style="width: 18rem;">
                    <div class="card-body text-center">
                        <p><img src="{{ asset('icons/icons8-road-50.png') }}" alt="" width="100" height="100"></p>
                        <a href="{{ url('/bus-routes') }}" class="btn btn-primary">Routes</a>
                    </div>
                </div>
                <div class="card m-auto" style="width: 18rem;">
                    <div class="card-body text-center">
                        <p><img src="{{ asset('icons/icons8-schedules-68.png') }}" alt="" width="100" height="100"></p>
                        <a href="{{ url('/schedule-bus') }}" class="btn btn-primary">Create Schedule</a>
                    </div>
                </div>
                <div class="card m-auto" style="width: 18rem;">
                    <div class="card-body text-center">
                        <p><img src="{{ asset('icons/icons8-schedules-68.png') }}" alt="" width="100" height="100"></p>
                        <a href="{{ url('/all-bus-schedules') }}" class="btn btn-primary">All Schedules</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
