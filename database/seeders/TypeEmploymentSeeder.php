<?php

namespace Database\Seeders;

use App\Models\TypeEmployment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeEmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $types = [
            'Tiempo completo',
            'Medio tiempo',
            'Por Contrato',
            'Freelance',
            'Temporal',
            'Prácticas',
        ];

        foreach ($types as $type) {
            TypeEmployment::query()->firstOrCreate([
                'name' => $type,
            ]);
        }
    }
}
