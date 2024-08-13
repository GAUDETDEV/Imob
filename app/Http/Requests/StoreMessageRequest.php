<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string',
            'sent_at' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'sender_id.required' => 'Le champ expéditeur est obligatoire.',
            'sender_id.exists' => 'L\'expéditeur sélectionné n\'existe pas.',
            'receiver_id.required' => 'Le champ destinataire est obligatoire.',
            'receiver_id.exists' => 'Le destinataire sélectionné n\'existe pas.',
            'content.required' => 'Le contenu du message est obligatoire.',
            'content.string' => 'Le contenu du message doit être une chaîne de caractères.',
            'sent_at.required' => 'Le champ date d\'envoi est obligatoire.',
            'sent_at.date' => 'Le champ date d\'envoi doit être une date valide.',
        ];
    }


}
