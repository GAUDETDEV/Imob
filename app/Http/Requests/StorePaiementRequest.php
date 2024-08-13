<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaiementRequest extends FormRequest
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
            'contrat_id' => 'required|exists:contrats,id',
            'montant' => 'required|numeric',
            'statut' => 'required|string',
            'payment_date' => 'required|date',
            'payment_methode' => 'required|string',
            'notes' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'contrat_id.required' => 'Le champ contrat est obligatoire.',
            'contrat_id.exists' => 'Le contrat sélectionné est invalide.',
            'montant.required' => 'Le champ montant est obligatoire.',
            'montant.numeric' => 'Le montant doit être un nombre.',
            'statut.required' => 'Le champ statut est obligatoire.',
            'statut.string' => 'Le statut doit être une chaîne de caractères.',
            'payment_date.required' => 'Le champ date de paiement est obligatoire.',
            'payment_date.date' => 'La date de paiement doit être une date valide.',
            'payment_methode.required' => 'Le champ méthode de paiement est obligatoire.',
            'payment_methode.string' => 'La méthode de paiement doit être une chaîne de caractères.',
            'notes.string' => 'Les notes doivent être une chaîne de caractères.',
        ];
    }

}
