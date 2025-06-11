<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeEmploymentRequest;
use App\Http\Requests\UpdateTypeEmploymentRequest;
use App\Interfaces\TypeEmploymentRepositoryInterface;

class TypeEmploymentController extends Controller
{
    private readonly TypeEmploymentRepositoryInterface $typeEmploymentRepository;

    public function __construct(TypeEmploymentRepositoryInterface $typeEmploymentRepository)
    {
        $this->typeEmploymentRepository = $typeEmploymentRepository;
    }

    public function index()
    {
        $typeEmployments = $this->typeEmploymentRepository->getAllTypeEmployments();
        return response()->json($typeEmployments);
    }

    public function store(StoreTypeEmploymentRequest $request)
    {
        $data = $request->validated();
        $typeEmployment = $this->typeEmploymentRepository->createTypeEmployment($data);
        return response()->json($typeEmployment, 201);
    }

    public function show(int $id)
    {
        $typeEmployment = $this->typeEmploymentRepository->getTypeEmploymentById($id);

        if (!$typeEmployment) {
            return response()->json(['message' => 'Type Employment not found'], 404);
        }
        return response()->json($typeEmployment);
    }

    public function update(UpdateTypeEmploymentRequest $request, int $id)
    {
        $data = $request->validated();
        $typeEmployment = $this->typeEmploymentRepository->updateTypeEmployment($id, $data);
        if (!$typeEmployment) {
            return response()->json(['message' => 'Type Employment not found'], 404);
        }
        return response()->json(['message' => 'Type Employment updated successfully']);
    }

    public function destroy(int $id)
    {
        $deleted = $this->typeEmploymentRepository->deleteTypeEmployment($id);
        if (!$deleted) {
            return response()->json(['message' => 'Type Employment not found'], 404);
        }
        return response()->json(['message' => 'Type Employment deleted successfully']);
    }
}
