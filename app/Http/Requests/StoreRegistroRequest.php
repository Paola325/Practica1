<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistroRequest extends FormRequest
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
            'role' => 'required|string', // Agregar la regla de validación para el campo role
            'nombre' => 'required|string',
            'email' => 'required|string|email',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'string|nullable',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
