<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'etat' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:20',
            'pays' => 'nullable|string|max:255',
            'role' => 'required|in:admin,agent,client',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }


    public function messages()
    {
        return [
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
            'prenom.max' => 'Le prénom ne peut pas dépasser 255 caractères.',
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.string' => 'L\'adresse email doit être une chaîne de caractères.',
            'email.email' => 'L\'adresse email doit être une adresse email valide.',
            'email.max' => 'L\'adresse email ne peut pas dépasser 255 caractères.',
            'email.unique' => 'L\'adresse email est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'telephone.string' => 'Le téléphone doit être une chaîne de caractères.',
            'telephone.max' => 'Le téléphone ne peut pas dépasser 20 caractères.',
            'adresse.string' => 'L\'adresse doit être une chaîne de caractères.',
            'adresse.max' => 'L\'adresse ne peut pas dépasser 255 caractères.',
            'ville.string' => 'La ville doit être une chaîne de caractères.',
            'ville.max' => 'La ville ne peut pas dépasser 255 caractères.',
            'etat.string' => 'L\'état doit être une chaîne de caractères.',
            'etat.max' => 'L\'état ne peut pas dépasser 255 caractères.',
            'code_postal.string' => 'Le code postal doit être une chaîne de caractères.',
            'code_postal.max' => 'Le code postal ne peut pas dépasser 20 caractères.',
            'pays.string' => 'Le pays doit être une chaîne de caractères.',
            'pays.max' => 'Le pays ne peut pas dépasser 255 caractères.',
            'role.required' => 'Le rôle est obligatoire.',
            'role.in' => 'Le rôle doit être admin, agent ou client.',
            'photo_profil.image' => 'La photo de profil doit être une image.',
            'photo_profil.mimes' => 'La photo de profil doit être un fichier de type: jpeg, png, jpg, gif.',
            'photo_profil.max' => 'La photo de profil ne peut pas dépasser 2048 kilooctets.',
        ];
    }


}
