<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJobRequest extends FormRequest
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
                // Check unique title only for active jobs (is_deleted = 0)
                Rule::unique('jobs')->where(function ($query) {
                    return $query->where('is_deleted', 0);
                }),
            ],
            'description' => 'nullable|string',
            'location'    => 'nullable|string',
            'last_date'   => 'nullable|date',
        ];
    }
}
