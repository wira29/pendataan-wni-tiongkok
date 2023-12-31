<?php

namespace App\Http\Requests\transaksi;

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
            'id_driver' => 'required|integer',
            'id_mobil' => 'required|integer',
            'nama_peminjam' => 'required|string|max:100',
            'no_hp' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
            'tanggalpinjam' => 'required|date',
            'tanggalkembali' => 'required|date',
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
            'id_driver.required' => 'ID Driver harus diisi',
            'id_driver.integer' => 'ID Driver harus berupa angka',
            'id_mobil.required' => 'ID Mobil harus diisi',
            'id_mobil.integer' => 'ID Mobil harus berupa angka',
            'nama_peminjam.required' => 'Nama Peminjam harus diisi',
            'nama_peminjam.string' => 'Nama Peminjam harus berupa string',
            'nama_peminjam.max' => 'Nama Peminjam maksimal 100 karakter',
            'no_hp.required' => 'No HP harus diisi',
            'no_hp.string' => 'No HP harus berupa string',
            'no_hp.max' => 'No HP maksimal 100 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat maksimal 100 karakter',
            'tanggalpinjam.required' => 'Tanggal Pinjam harus diisi',
            'tanggalpinjam.date' => 'Tanggal Pinjam harus berupa tanggal',
            'tanggalkembali.required' => 'Tanggal Kembali harus diisi',
            'tanggalkembali.date' => 'Tanggal Kembali harus berupa tanggal',
        ];
    }
}
