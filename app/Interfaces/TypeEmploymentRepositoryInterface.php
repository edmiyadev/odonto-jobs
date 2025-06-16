<?php

namespace App\Interfaces;

use App\Models\TypeEmployment;
use Illuminate\Database\Eloquent\Collection;

interface TypeEmploymentRepositoryInterface
{
    public function getAllTypeEmployments(): Collection;
    public function getTypeEmploymentById(int $id): TypeEmployment | null;
    public function createTypeEmployment(array $data) : TypeEmployment;
    public function updateTypeEmployment(int $id, array $data) : bool;
    public function deleteTypeEmployment(int $id): bool;
}
