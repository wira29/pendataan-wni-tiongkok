<?php

namespace App\Http\Requests\mobil;

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
            'nama' => 'required|string|max:100',
            'jumlah_kursi' => 'required|integer',
            'merk' => 'required|string|max:100',
            'harga' => 'required|integer',
            'jenis_kendaraan' => 'required|string|max:100',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048',
            'transmisi' => 'required|string|max:100',
            'no_polisi' => 'required|string|max:100',
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
            'nama.required' => 'Nama harus diisi',
            'nama.string' => 'Nama harus berupa string',
            'nama.max' => 'Nama maksimal 100 karakter',
            'jumlah_kursi.required' => 'Jumlah kursi harus diisi',
            'jumlah_kursi.integer' => 'Jumlah kursi harus berupa angka',
            'merk.required' => 'Merk harus diisi',
            'merk.string' => 'Merk harus berupa string',
            'merk.max' => 'Merk maksimal 100 karakter',
            'harga.required' => 'Harga harus diisi',
            'harga.integer' => 'Harga harus berupa angka',
            'jenis_kendaraan.required' => 'Jenis kendaraan harus diisi',
            'jenis_kendaraan.string' => 'Jenis kendaraan harus berupa string',
            'jenis_kendaraan.max' => 'Jenis kendaraan maksimal 100 karakter',
            'gambar.image' => 'Gambar harus berupa gambar',
            'gambar.mimes' => 'Gambar harus berupa gambar dengan format jpg, jpeg, atau png',
            'gambar.max' => 'Gambar maksimal 2MB',
            'transmisi.required' => 'Transmisi harus diisi',
            'transmisi.string' => 'Transmisi harus berupa string',
            'transmisi.max' => 'Transmisi maksimal 100 karakter',
            'no_polisi.required' => 'No Polisi harus diisi',
            'no_polisi.string' => 'No Polisi harus berupa string',
            'no_polisi.max' => 'No Polisi maksimal 100 karakter',
        ];
    }
}
