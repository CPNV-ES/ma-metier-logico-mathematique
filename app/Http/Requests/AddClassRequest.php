<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //temporaire
        //return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'SchoolClass_name'=>['required', 'regex:/^[a-z0-9\-]+$/'],
            'SchoolClass_code'=>['required', 'numeric', 'min:4', 'max:4', 'unique:SchoolClass', 'regex:/^[0-9]+$/']
        ];
    }
}
