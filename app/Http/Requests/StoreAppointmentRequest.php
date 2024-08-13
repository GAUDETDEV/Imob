<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'agent_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:users,id',
            'property_id' => 'required|exists:properties,id',
            'date_debut' => 'required|date|after:now',
            'date_fin' => 'required|date|after:date_debut',
            'statut' => 'required|string',
            'notes' => 'nullable|string',
        ];
    }


    public function messages()
    {
        return [

            'agent_id.required' => 'Le champ agent est obligatoire.',
            'agent_id.exists' => 'L\'agent sélectionné n\'existe pas.',
            'client_id.required' => 'Le champ client est obligatoire.',
            'client_id.exists' => 'Le client sélectionné n\'existe pas.',
            'property_id.required' => 'Le champ propriété est obligatoire.',
            'property_id.exists' => 'La propriété sélectionnée n\'existe pas.',
            'date_debut.required' => 'Le champ date de début est obligatoire.',
            'date_debut.date' => 'Le champ date de début doit être une date valide.',
            'date_debut.after' => 'La date de début doit être une date future.',
            'date_fin.required' => 'Le champ date de fin est obligatoire.',
            'date_fin.date' => 'Le champ date de fin doit être une date valide.',
            'date_fin.after' => 'La date de fin doit être après la date de début.',
            'statut.required' => 'Le champ statut est obligatoire.',
            'statut.string' => 'Le champ statut doit être une chaîne de caractères.',
            'notes.string' => 'Le champ notes doit être une chaîne de caractères.',
        ];
    }



}
