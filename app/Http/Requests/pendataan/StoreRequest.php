<?php

namespace App\Http\Requests\pendataan;

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
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'batas_tanggal' => 'required|date|after_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Judul harus diisi',
            'judul.string' => 'Judul harus berupa string',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'deskripsi.string' => 'Deskripsi harus berupa string',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar dengan format jpg, jpeg, atau png',
            'foto.max' => 'Foto maksimal berukuran 2 MB',
            'batas_tanggal.required' => 'Batas tanggal harus diisi',
            'batas_tanggal.date' => 'Batas tanggal harus berupa tanggal',
            'batas_tanggal.after_or_equal' => 'Batas tanggal harus setelah atau sama dengan hari ini',
        ];
    }
}
