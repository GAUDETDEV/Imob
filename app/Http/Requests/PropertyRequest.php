<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'adresse' => 'required|min:3|string',
            'ville' => 'required|min:3|string',
            'code_postal' => 'required|integer',
            'type' => 'required|min:3|string',
            'etat' => 'required|min:3|string',
            'surface' => 'required|min:1',
            'prix' => 'required|max:9',
            'description' => 'required|min:10',
            'statut' => 'required',
        ];
    }

    public function messages(){

        return [

            "adresse.required" => "L'adresse est requise!",
            "adresse.min" => "L'adresse doit contenir au minimum trois(3) caractères!",
            "adresse.string" => "L'adresse n'est pas au bon format!",
            "ville.required" => "La ville est requise!",
            "ville.min" => "La ville doit contenir au minimum trois(3) caractères!",
            "ville.string" => "La ville n'est pas au bon format!",
            "code_postal.required" => "Le code postal est requis!",
            "code_postal.integer" => "Le code postal n'est pas au bon format!",
            "type.required" => "Le type est requis!",
            "type.min" => "Le type doit contenir au minimum trois(3) caractères!",
            "type.string" => "Le type n'est pas au bon format!",
            "etat.required" => "L'etat est requis!",
            "etat.min" => "L'etat doit contenir au minimum trois(3) caractères!",
            "etat.string" => "L'etat n'est pas au bon format!",
            "surface.required" => "La surface est requise!",
            "surface.min" => "La surface doit contenir au minimum un(1) caractère!",
            "prix.required" => "Le prix est requis!",
            "prix.max" => "Le prix doit contenir au maximum neuf(9) chiffres!",
            "description.required" => "La description est requise!",
            "description.min" => "La description doit contenir au minimum dix(10) caractères!",
            "statut.required" => "Le statut est requis!",

        ];

    }

}
