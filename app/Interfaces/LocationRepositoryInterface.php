<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface LocationRepositoryInterface
{
    public function getAllLocations(): Collection;
}
