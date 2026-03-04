<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|min:5|max:150|unique:posts',
            'content' => 'required',
            'author' => ['required', 'max:100'],
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'title.required' => 'El título es obligatorio.',
    //         'title.min' => 'El título debe tener al menos :min caracteres.',
    //         'title.max' => 'El título no puede tener más de :max caracteres.',
    //         'title.unique' => 'El título ya existe. Por favor, elige otro.',
    //         'content.required' => 'El contenido es obligatorio.',
    //         'author.required' => 'El autor es obligatorio.',
    //         'author.max' => 'El autor no puede tener más de :max caracteres.',
    //     ];
    // }
}
