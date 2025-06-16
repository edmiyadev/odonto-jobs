<?php

namespace App\Interfaces;

use App\Models\Vacancy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface VacancyRepositoryInterface
{
    public function getAllVacancies(Request $request): LengthAwarePaginator ;
    public function getVacancyById(int $id): Vacancy | null;
    public function createVacancy(array $data) : Vacancy;
    public function updateVacancy(int $id, array $data) : bool;
    public function deleteVacancy(int $id) : bool;
}
