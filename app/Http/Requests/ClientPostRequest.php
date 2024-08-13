<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientPostRequest extends FormRequest
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
            //
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email',
            'telephone' => 'required|string|max:15',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
            'date_naissance' => 'nullable|date',
            'sexe' => 'nullable|string|in:Homme,Femme,Autre',
            'nationalite' => 'nullable|string|max:255',
            'numero_identification' => 'nullable|string|max:255',
            'biographie' => 'nullable|string',
        ];
    }

    public function messages(){

        return [
            'nom.required' => 'Le champ nom est obligatoire.',
            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'Le champ email doit être une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'telephone.required' => 'Le champ téléphone est obligatoire.',
            'adresse.required' => 'Le champ adresse est obligatoire.',
            'ville.required' => 'Le champ ville est obligatoire.',
            'code_postal.required' => 'Le champ code postal est obligatoire.',
            'date_naissance.date' => 'Veulliez rentrer une date correcte.',
            'nationalite.max' => 'La nationalité doit être constituée au maximum de 255 caractères.',
        ];

    }

}
