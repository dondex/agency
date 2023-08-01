<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'job_id' => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string'
            ],
            'number' => [
                'required',
                'string'
            ],
            'letter' => [
                'required'
            ],
            'image' => [
                'required',
                'mimes:jpeg,jpg,png,pdf'
            ],
            'apply_status' => [
                'required'
            ],

        ];

        return $rules;
    }
}
