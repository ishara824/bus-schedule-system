<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    public function bus_route()
    {
        return $this->belongsTo(BusRoute::class,'bus_route_id','id');
    }

    protected $with = ['bus_route'];
}
