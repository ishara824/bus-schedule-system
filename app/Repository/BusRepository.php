<?php

namespace App\Repository;

use App\Iface\BusRepositoryInterface;
use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\BusSchedule;
use function Laravel\Prompts\select;

class BusRepository implements BusRepositoryInterface
{
    public function findAllBuses()
    {
        return Bus::with('bus_route')->paginate(10);
    }

    public function findAllBusRoutes()
    {
//        $buses = BusRoute::query()
//            ->join('buses','bus_routes.id','=','buses.bus_route_id')
//            ->select('*')
//            ->paginate(10);
        return BusRoute::query()->paginate(10);
    }

    public function findAllBusSchedules()
    {
        return BusSchedule::with('bus')->paginate(10);
    }
}
