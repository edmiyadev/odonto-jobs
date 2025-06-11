<?php

namespace App\Repositories;

use App\Interfaces\TypeEmploymentRepositoryInterface;
use App\Models\TypeEmployment;

class TypeEmploymentRepository implements TypeEmploymentRepositoryInterface
{
    public function getAllTypeEmployments()
    {
        return TypeEmployment::all();
    }

    public function getTypeEmploymentById(int $id)
    {
        return TypeEmployment::query()->find($id);
    }

    public function createTypeEmployment(array $data)
    {
        return TypeEmployment::create($data);
    }

    public function updateTypeEmployment(int $id, array $data)
    {
        $typeEmployment = $this->getTypeEmploymentById($id);
        return  $typeEmployment->update($data);
    }

    public function deleteTypeEmployment(int $id)
    {
        $typeEmployment = $this->getTypeEmploymentById($id);

        return $typeEmployment?->delete();
    }
}
