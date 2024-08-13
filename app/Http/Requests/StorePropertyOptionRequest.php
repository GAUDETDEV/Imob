<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyOptionRequest extends FormRequest
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
            'property_id' => 'required|exists:properties,id',
            'option_name' => 'required|string|max:255',
            'option_value' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'property_id.required' => 'Le champ ID de la propriété est obligatoire.',
            'property_id.exists' => 'L\'ID de la propriété doit exister dans la table des propriétés.',
            'option_name.required' => 'Le champ Nom de l\'option est obligatoire.',
            'option_name.string' => 'Le champ Nom de l\'option doit être une chaîne de caractères.',
            'option_name.max' => 'Le champ Nom de l\'option ne doit pas dépasser 255 caractères.',
            'option_value.required' => 'Le champ Valeur de l\'option est obligatoire.',
            'option_value.string' => 'Le champ Valeur de l\'option doit être une chaîne de caractères.',
            'option_value.max' => 'Le champ Valeur de l\'option ne doit pas dépasser 255 caractères.',
        ];
    }
}
