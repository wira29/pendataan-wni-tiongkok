<?php

namespace App\Http\Requests\informasi;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'judul' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'judul.required' => 'Judul harus diisi',
            'judul.string' => 'Judul harus berupa string',
            'judul.max' => 'Judul maksimal 100 karakter',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'deskripsi.string' => 'Deskripsi harus berupa string',
            'gambar.image' => 'Gambar harus berupa gambar',
            'gambar.mimes' => 'Gambar harus berupa gambar dengan format jpg, jpeg, atau png',
            'gambar.max' => 'Gambar maksimal 2MB',
        ];
    }
}
