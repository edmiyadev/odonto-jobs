<?php

namespace App\Repositories;

use App\Interfaces\VacancyRepositoryInterface;
use App\Models\Vacancy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class VacancyRepository implements VacancyRepositoryInterface
{
    public function getAllVacancies(Request $request): LengthAwarePaginator
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

    public function getVacancyById(int $id): Vacancy|null
    {
        return Vacancy::query()->with([
            'location:id,name',
            'typeEmployment:id,name'
        ])->find($id);
    }

    public function createVacancy(array $data): Vacancy
    {
        return Vacancy::create($data);
    }

    public function updateVacancy(int $id, array $data): bool
    {
        $vacancy = $this->getVacancyById($id);
        if (!$vacancy) return false;

        return  $vacancy?->update($data);
    }

    public function deleteVacancy(int $id): bool
    {
        $vacancy = $this->getVacancyById($id);
        if (!$vacancy) return false;

        return $vacancy?->delete();
    }
}
