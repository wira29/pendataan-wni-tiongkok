<?php

namespace App\Http\Requests\informasi;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'judul' => 'required|string|max:50',
            'deskripsi' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul harus diisi',
            'judul.string' => 'Judul harus berupa string',
            'judul.max' => 'Judul maksimal 50 karakter',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'deskripsi.string' => 'Deskripsi harus berupa string',
            'deskripsi.max' => 'Deskripsi maksimal 255 karakter',
            'gambar.image' => 'File yang diunggah harus berupa gambar',
            'gambar.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif, svg',
            'gambar.max' => 'Ukuran gambar maksimal 2048 KB',
        ];
    }
}
