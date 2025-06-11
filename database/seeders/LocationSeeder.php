<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            "Azua",
            "Bahoruco",
            "Barahona",
            "Dajabón",
            "Duarte",
            "El Seibo",
            "Elías Piña",
            "Espaillat",
            "Hato Mayor",
            "Hermanas Mirabal",
            "Independencia",
            "La Altagracia",
            "La Romana",
            "La Vega",
            "María Trinidad Sánchez",
            "Monseñor Nouel",
            "Monte Cristi",
            "Monte Plata",
            "Pedernales",
            "Peravia",
            "Puerto Plata",
            "Samaná",
            "San Cristóbal",
            "San José de Ocoa",
            "San Juan",
            "San Pedro de Macorís",
            "Sánchez Ramírez",
            "Santiago",
            "Santiago Rodríguez",
            "Santo Domingo, Distrito Nacional",
            "Santo Domingo Este",
            "Santo Domingo Norte",
            "Santo Domingo Oeste",
            "Valverde"
        ];

        foreach ($locations as $location) {
            Location::query()->firstOrCreate([
                'name' => $location,
            ]);
        }
    }
}
