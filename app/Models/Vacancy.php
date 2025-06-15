<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    /** @use HasFactory<\Database\Factories\VacancyFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'company_name',
        'location_id',
        'type_employment_id',
        'salary_min',
        'salary_max',
        'description',
        'requirements',
        'benefits',
        'company_email',
        'company_phone'
    ];
    protected $casts = [
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
        'experience_level' => 'string',
        'educational_level' => 'string',
    ];
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function typeEmployment()
    {
        return $this->belongsTo(TypeEmployment::class);
    }
}
