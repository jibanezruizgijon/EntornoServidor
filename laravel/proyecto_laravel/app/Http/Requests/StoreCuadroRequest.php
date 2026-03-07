<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCuadroRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'epocaPintura' => 'required|string|max:255',
            'urlImg' => 'required|image',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'autor.required' => 'El autor es obligatorio.',
            'epocaPintura.required' => 'La época de pintura es obligatoria.',
            'urlImg.required' => 'La imagen es obligatoria.',
            'urlImg.image' => 'El archivo debe ser una imagen válida.',
            'urlImg.max' => 'La imagen no debe pesar más de 2MB.',
            'urlImg.uploaded' => 'La imagen pesa demasiado. El tamaño máximo permitido por el servidor es de 2MB.',
        ];
    }
}
