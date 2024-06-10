<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name'=> 'required|min:10',
            'description' => 'nullable|max:10000',
            'github_url'=> 'required|max:200',
            'type_id' => 'nullable|exists:types,id',
            'technologies'=> 'exists:technologies,id'
        ];
    }
}
