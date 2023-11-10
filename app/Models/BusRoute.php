<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;

    public function buses()
    {
        return $this->hasMany(Bus::class, 'bus_route_id', 'id');
    }

    //protected $with = ['buses'];

}
