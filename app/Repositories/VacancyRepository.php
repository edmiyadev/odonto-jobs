<?php

namespace App\Repositories;

use App\Interfaces\VacancyRepositoryInterface;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyRepository implements VacancyRepositoryInterface
{
    public function getAllVacancies(Request $request)
    {
        $query =  Vacancy::query();

        $request->has('title') && $query->where('title', 'like', '%' . $request->input('title') . '%');
        $request->has('company_name') && $query->where('company_name', 'like', '%' . $request->input('company_name') . '%');
        $request->has('description') && $query->where('description', 'like', '%' . $request->input('description') . '%');
        $request->has('requirements') && $query->where('requirements', 'like', '%' . $request->input('requirements') . '%');
        $request->has('location_id') && $query->where('location_id',  $request->input('location_id'));
        $request->has('type_employment_id') && $query->where('type_employment_id',  $request->input('type_employment_id'));

        return $query->with([
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
