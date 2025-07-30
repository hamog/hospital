<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DoctorStoreRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'speciality_id' => 'bail|required|integer|exists:specialities,id',
            'national_code' => 'nullable|string|max:100',
            'medical_number' => 'nullable|string|max:100',
            'mobile' => 'required|digits:11|unique:doctors,mobile',
            'password' => 'required|string|min:6|confirmed',
            'status' => 'boolean',
            'doctor_roles' => 'required|array',
            'doctor_roles.*' => 'required|integer|exists:doctor_roles,id',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'status' => $this->boolean('status'),
        ]);
    }
}
