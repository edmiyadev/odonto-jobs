<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Interfaces\VacancyRepositoryInterface;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    private readonly VacancyRepositoryInterface $vacancyRepository;

    public function __construct(VacancyRepositoryInterface $vacancyRepository)
    {
        $this->vacancyRepository = $vacancyRepository;
    }

    public function index(Request $request)
    {
        $typeEmployments = $this->vacancyRepository->getAllVacancies($request);
        return response()->json($typeEmployments);
    }

    public function store(StoreVacancyRequest $request)
    {
        $vacancy = $this->vacancyRepository->createVacancy($request->validated());
        return response()->json($vacancy, 201);
    }

    public function show(int $id)
    {
        $vacancy = $this->vacancyRepository->getVacancyById($id);
        if (!$vacancy) return response()->json(['message' => 'Vacancy not found'], 404);

        return response()->json($vacancy);
    }

    public function update(UpdateVacancyRequest $request, int  $id)
    {
        $vacancy = $this->vacancyRepository->updateVacancy($id, $request->validated());
        if (!$vacancy) return response()->json(['message' => 'Vacancy not found'], 404);

        return response()->json(['message' => 'Vacancy updated successfully']);
    }

    public function destroy(int $id)
    {
        $deleted = $this->vacancyRepository->deleteVacancy($id);
        if (!$deleted) return response()->json(['message' => 'Vacancy not found'], 404);

        return response()->json(['message' => 'Vacancy deleted successfully']);
    }
}
