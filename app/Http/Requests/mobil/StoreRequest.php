<?php

namespace App\Http\Requests\mobil;

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
            'nama' => 'required|string|max:100',
            'merk' => 'required|string|max:100',
            'jumlah_kursi' => 'required|string|max:100',
            'harga' => 'required|string|max:100',
            'jenis_kendaraan' => 'required|string|max:100',
            'transmisi' => 'required|string|max:100',
            'no_polisi' => 'required|string|max:100',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
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
            'nama.required' => 'Nama Mobil harus diisi',
            'merk.required' => 'Merk Mobil harus diisi',
            'jumlah_kursi.required' => 'Jumlah Kursi harus diisi',
            'harga.required' => 'Harga harus diisi',
            'jenis_kendaraan.required' => 'Jenis Kendaraan harus diisi',
            'transmisi.required' => 'Transmisi harus diisi',
            'no_polisi.required' => 'No Polisi harus diisi',
            'gambar.image' => 'Gambar harus berupa file gambar (jpg, jpeg, png)',
            'gambar.required' => 'Gambar harus diisi',
        ];
    }
}
