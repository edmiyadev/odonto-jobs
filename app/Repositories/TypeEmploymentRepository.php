<?php

namespace App\Repositories;

use App\Interfaces\TypeEmploymentRepositoryInterface;
use App\Models\TypeEmployment;
use Illuminate\Database\Eloquent\Collection;

class TypeEmploymentRepository implements TypeEmploymentRepositoryInterface
{
    public function getAllTypeEmployments(): Collection
    {
        return TypeEmployment::all();
    }

    public function getTypeEmploymentById(int $id): TypeEmployment|null
    {
        return TypeEmployment::query()->find($id);
    }

    public function createTypeEmployment(array $data): TypeEmployment
    {
        return TypeEmployment::create($data);
    }

    public function updateTypeEmployment(int $id, array $data): bool
    {
        $typeEmployment = $this->getTypeEmploymentById($id);
        if (!$typeEmployment) return false;
        return  $typeEmployment?->update($data);
    }

    public function deleteTypeEmployment(int $id): bool
    {
        $typeEmployment = $this->getTypeEmploymentById($id);
        if (!$typeEmployment) return false;


        return $typeEmployment?->delete();
    }
}
