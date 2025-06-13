<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\TypeEmployment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'company_name' => $this->faker->company(),
            'location_id' => $this->faker->randomElement(Location::pluck('id')->toArray()),
            'type_employment_id' => $this->faker->randomElement(TypeEmployment::pluck('id')->toArray()),
            'salary_min' => $this->faker->numberBetween(30000, 120000),
            'salary_max' => $this->faker->numberBetween(30000, 120000),
            'description' => $this->faker->paragraph(),
            'requirements' => $this->faker->paragraph(),
            'benefits' => $this->faker->paragraph(),
            'experience_level' => $this->faker->randomElement(['sin experiencia', '1-2', '3-5', '5', '10']),
            'educational_level' => $this->faker->randomElement(['Bachillerato', 'Técnico', 'Especialidad', 'Maestría', 'Doctorado']),
            'company_email' => $this->faker->email(),
            'company_phone' => $this->faker->phoneNumber(),
        ];
    }
}
