<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //Si l'utilisateur est authentifié en tant que teacher, il a le droit de modifier
        return auth('teacher')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    //validation des données de formulaire de classe
    public function rules(): array
    {
        return [
            'SchoolClass_name' => [
                'required',
                'regex:/^[a-zA-Z0-9\-\s]+$/'
            ],

            'SchoolClass_code' => [
                'required',
                'digits:4',
                Rule::unique('school_classes', 'class_code')
                    ->ignore(optional($this->route('schoolClass'))->id) //ignore l'unique uniquement si l'id de la classe corresponde à celle qui possède le meme code de classe (et si la classe possède un id, comme ça pas de soucis lors de la création)
            ],
        ];

    }

    //messages en français
    public function messages()
    {
        return [
            'SchoolClass_name.required' => 'Le nom de la classe est obligatoire.',
            'SchoolClass_name.regex'    => 'Le nom ne doit contenir que des lettres, chiffres, espaces ou tirets.',

            'SchoolClass_code.required' => 'Le code de la classe est obligatoire.',
            'SchoolClass_code.digits'   => 'Le code doit contenir exactement 4 chiffres.',
            'SchoolClass_code.unique'   => 'Ce code est déjà utilisé.',
        ];
    }

}
