<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyPhotoModifyRequest extends FormRequest
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
            'titre_photo' => 'required|string|max:255',
            'description_photo' => 'nullable|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Limite de 2MB pour la photo

        ];
    }


    public function messages()
    {
        return [
            //
            'titre_photo.required' => 'Le titre est requis!',
            'titre_photo.string' => "Le tritre n'est pas au bon format!",
            'titre_photo.max' => 'Le titre doit contenir au maximum 255 caractères!',
            'description_photo.string' => "La description n'est pas au bon format!",
            'photo.image' => 'Veulliez importer une image svp!',
            'photo.mimes' => 'La photo doit être aux formats : jpeg,png,jpg,gif|max:2048',
            'photo.max' => 'Limite de 2MB pour la photo!', // Limite de 2MB pour la photo

        ];
    }


}
