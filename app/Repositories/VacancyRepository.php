<?php

namespace App\Repositories;

use App\Interfaces\VacancyRepositoryInterface;
use App\Models\Vacancy;

class VacancyRepository implements VacancyRepositoryInterface
{
    public function getAllVacancies()
    {
        return Vacancy::query()->with([
            'location:id,name',
            'typeEmployment:id,name'
        ])->orderBy('created_at', 'desc')->paginate();
    }

    public function getVacancyById(int $id)
    {
        return Vacancy::query()->with([
            'location:id,name',
            'typeEmployment:id,name'
        ])->find($id);
    }

    public function createVacancy(array $data)
    {
        return Vacancy::create($data);
    }

    public function updateVacancy(int $id, array $data)
    {
        $vacancy = $this->getVacancyById($id);
        return  $vacancy?->update($data);
    }

    public function deleteVacancy(int $id)
    {
        $vacancy = $this->getVacancyById($id);
        return $vacancy?->delete();
    }
}
