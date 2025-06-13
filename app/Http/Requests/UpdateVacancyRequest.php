<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'company_name' => 'sometimes|required|string|max:255',
            'location_id' => 'sometimes|required|exists:locations,id',
            'type_employment_id' => 'sometimes|required|exists:type_employments,id',
            'salary_min' => 'sometimes|nullable|numeric|min:0',
            'salary_max' => 'sometimes|nullable|numeric|min:0',
            'description' => 'sometimes|required|string',
            'requirements' => 'sometimes|nullable|string',
            'benefits' => 'sometimes|nullable|string',
            'experience_level' => 'sometimes|nullable|string|in:sin experiencia,1-2,3-5,5+,10',
            'educational_level' => 'sometimes|nullable|string|in:Bachillerato,Técnico,Especialidad,Maestría,Doctorado',
            'company_email' => 'sometimes|required|email|max:255',
            'company_phone' => 'sometimes|nullable|string|max:20',
        ];
    }
}
