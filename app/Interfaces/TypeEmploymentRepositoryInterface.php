<?php

namespace App\Interfaces;

interface TypeEmploymentRepositoryInterface
{
    public function getAllTypeEmployments();
    public function getTypeEmploymentById(int $id);
    public function createTypeEmployment(array $data);
    public function updateTypeEmployment(int $id, array $data);
    public function deleteTypeEmployment(int $id);
}
