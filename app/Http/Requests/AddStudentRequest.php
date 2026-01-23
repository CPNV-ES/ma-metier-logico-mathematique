<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddStudentRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'regex:/^[a-zA-Z\-\s]+$/'
            ],

            'last_name' => [
                'required',
                'regex:/^[a-zA-Z\-\s]+$/',
                Rule::unique('students')
                    ->ignore(optional($this->route('student'))->id) //pour la modification
                    ->where(fn ($query) => $query->where('first_name', $this->first_name)) //par avoir meme prenom + meme nom fn=fonction anonyme (query est sa variable)
                ],
        ];
    }

    //messages en français
    public function messages()
    {
        return [
            'first_name.required' => 'Le nom de l\'élève est obligatoire.',
            'first_name.regex'    => 'Le nom ne doit contenir que des lettres, espaces ou tirets.',

            'last_name.required' => 'Le prénom de l\'élève est obligatoire.',
            'last_name.regex'   => 'Le prénom ne doit contenir que des lettres, espaces ou tirets.',
            'last_name.unique'   => 'Cet élève existe déjà.'
        ];
    }
}
