<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
			'CI' => 'required',
			'user' => 'required|string',
			'NombreCompleto' => 'required|string',
            'password' => 'required|string|min:6',
			'sexo' => 'required',
			'telefono' => 'required',
			'direccion' => 'required|string',
			'fch_reg' => 'nullable|date',
			'id_rol' => 'required',
        ];
    }
}
