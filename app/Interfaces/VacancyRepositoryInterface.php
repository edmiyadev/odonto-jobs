<?php

namespace App\Interfaces;

interface VacancyRepositoryInterface
{
    public function getAllVacancies();
    public function getVacancyById(int $id);
    public function createVacancy(array $data);
    public function updateVacancy(int $id, array $data);
    public function deleteVacancy(int $id);
}
