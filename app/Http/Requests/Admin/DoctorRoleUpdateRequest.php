<?php

namespace App\Http\Requests\Admin;

use App\Models\DoctorRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class DoctorRoleUpdateRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('doctor_roles')->ignore($this->route('doctor_role')->id)
            ],
            'required' => 'boolean',
            'quota' => 'required|integer|between:1,100',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'required' => $this->boolean('required'),
        ]);
    }

    /**
     * @throws ValidationException
     */
    protected function passedValidation()
    {
        $doctorRole = $this->route('doctor_role');
        $sumQuota = DoctorRole::getSumQuota();
        $currentSumQuota = ($sumQuota - $doctorRole->quota) + $this->input('quota');

        if ($currentSumQuota > 100) {
            throw ValidationException::withMessages([
                'quota' => ['مجموع سهم پزشک نباید بیشتر از 100 شود.']
            ]);
        }

    }
}
