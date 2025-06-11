<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Interfaces\LocationRepositoryInterface;
use App\Models\Location;

class LocationController extends Controller
{
    private readonly LocationRepositoryInterface $locationRepository;

    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = $this->locationRepository->getAllLocations();
        return response()->json($locations);
    }
}
