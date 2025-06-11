<?php

namespace App\Repositories;

use App\Interfaces\LocationRepositoryInterface;
use App\Models\Location;

class LocationRepository implements LocationRepositoryInterface
{
    public function getAllLocations()
    {
        return Location::all();
    }
}
