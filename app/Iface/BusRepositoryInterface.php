<?php

namespace App\Iface;

interface BusRepositoryInterface
{
    public function findAllBuses();

    public function findAllBusRoutes();

    public function findAllBusSchedules();
}
