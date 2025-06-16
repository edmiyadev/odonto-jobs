<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface VacancyRepositoryInterface
{
    public function getAllVacancies(Request $request);
    public function getVacancyById(int $id);
    public function createVacancy(array $data);
    public function updateVacancy(int $id, array $data);
    public function deleteVacancy(int $id);
}
