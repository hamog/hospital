<?php

namespace App\Http\Requests\Admin;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InsuranceStoreRequest extends FormRequest
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
            'type' => ['required', Rule::in(['basic', 'supplementary'])],
            'name' => [
                'bail',
                'required',
                'string',
                'max:255',
                Rule::unique('insurances', 'name')->where(function (Builder $query) {
                    return $query->where('type', $this->input('type'));
                })
            ],
            'discount' => 'required|integer|min:1|max:100',
            'status' => 'boolean',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'status' => $this->boolean('status'),
        ]);
    }
}
