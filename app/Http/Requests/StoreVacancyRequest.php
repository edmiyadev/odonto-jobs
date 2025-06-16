<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacancyRequest extends FormRequest
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
            'salary_min' => 'sometimes|required|numeric|min:0',
            'salary_max' => 'sometimes|nullable|numeric|min:0',
            'description' => 'sometimes|required|string',
            'requirements' => 'sometimes|nullable|string',
            'benefits' => 'sometimes|nullable|string',
            'company_email' => 'sometimes|required|email|max:255',
            'company_phone' => 'sometimes|nullable|string|max:20',
        ];
    }
}
