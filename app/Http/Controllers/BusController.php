<?php

namespace App\Http\Controllers;

use App\Iface\BusRepositoryInterface;
use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\BusSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BusController extends Controller
{
    private $busRepositoryInterface;

    public function __construct(BusRepositoryInterface $busRepositoryInterface)
    {
        $this->middleware('auth');
        $this->busRepositoryInterface = $busRepositoryInterface;
    }

    public function findAllBuses()
    {
        $buses = $this->busRepositoryInterface->findAllBuses();
        return view('bus.busList')->with(['buses' => $buses]);
    }

    public function findAllBusRoutes()
    {
        $busRoutes = $this->busRepositoryInterface->findAllBusRoutes();
        return view('bus.busRouteList')->with(['busRoutes' => $busRoutes]);
    }

    public function registerBusForm()
    {
        $busRoutes = BusRoute::all();
        return view('bus.busCreate')->with(['busRoutes' => $busRoutes]);
    }

    public function registerBus(Request $request)
    {
        $request->validate([
            'bus_name' => 'required',
            'license_number' => 'required',
            'chassis_number' => 'required',
            'bus_route_id' => 'required'
        ]);

        $bus = new Bus();
        $bus->name = $request->bus_name;
        $bus->license_number = $request->license_number;
        $bus->chassis_number = $request->chassis_number;
        $bus->bus_route_id = $request->bus_route_id;
        $bus->save();

        Session::flash('message', 'Bus Registered Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('bus.list.ui');

    }

    public function scheduleBusForm()
    {
        $buses = Bus::all();
        return view('bus.busSchedule')->with(['buses' => $buses]);
    }

    public function scheduleBus(Request $request)
    {
        $request->validate([
            'bus_id' => 'required',
            'departure_time' => 'required'
        ]);

        $bus = Bus::query()->find($request->bus_id);
        $busSchedule = new BusSchedule();
        $busSchedule->bus_id = $bus->id;
        $busSchedule->route_id = $bus->bus_route->id;
        $busSchedule->departure_time = date("H:i:s",strtotime($request->departure_time));
        $busSchedule->save();

        Session::flash('schedule-message', 'Bus Scheduled Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('bus.schedule.ui');

    }

    public function findAllBusSchedules()
    {
        $schedules = $this->busRepositoryInterface->findAllBusSchedules();
        return view('bus.scheduleList')->with(['schedules' => $schedules]);
    }
}
