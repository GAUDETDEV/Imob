<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogActivityRequest extends FormRequest
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
            'action' => 'nullable|required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'user_id' => 'required|integer|exists:users,id',
            'logged_at' => 'required|date',
        ];
    }
}
