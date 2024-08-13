<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyDocumentRequest extends FormRequest
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
            'document_name' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf,doc,docx,xlsx,txt|max:2048',
            'document_type' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:500',
            'upload_date' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'property_id.required' => 'Le champ propriété est obligatoire.',
            'property_id.exists' => 'La propriété sélectionnée est invalide.',
            'document_name.required' => 'Le nom du document est obligatoire.',
            'document_name.string' => 'Le nom du document doit être une chaîne de caractères.',
            'document_name.max' => 'Le nom du document ne peut pas dépasser 255 caractères.',
            'document.required' => 'Le fichier est obligatoire.',
            'document.file' => 'Le fichier doit être un fichier valide.',
            'document.mimes' => 'Le fichier doit être au format pdf, doc, docx ou txt.',
            'document.max' => 'Le fichier ne peut pas dépasser 2 Mo.',
            'document_type.string' => 'Le type de document doit être une chaîne de caractères.',
            'document_type.max' => 'Le type de document ne peut pas dépasser 50 caractères.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'description.max' => 'La description ne peut pas dépasser 500 caractères.',
            'upload_date.date' => 'La date de téléchargement doit être une date valide.',
        ];
    }
}
