<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyVideoRequest extends FormRequest
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
            'titre_video' => 'required|string|max:255',
            'description_video' => 'nullable|string',
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:20000', // Limite de 2MB pour la photo
        ];
    }

    public function messages()
    {
        return [
            //
            'titre_video.required' => 'Le titre est requis!',
            'titre_video.string' => "Le tritre n'est pas au bon format!",
            'titre_video.max' => 'Le titre doit contenir au maximum 255 caractères!',
            'description_video.string' => "La description n'est pas au bon format!",
            'video.required' => 'La video est requise!',
            'video.mimes' => 'La video doit être aux formats : mp4,mov,ogg,qt',
            'video.max' => 'Limite de 20MB pour la video!', // Limite de 20MB pour la video

        ];
    }



}
