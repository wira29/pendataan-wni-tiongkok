<?php

namespace App\Http\Requests\ranting;

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
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'cabang_id' => 'required|exists:cabangs,id',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama Ranting harus diisi',
            'nama.string' => 'Nama Ranting harus berupa string',
            'nama.max' => 'Nama Ranting maksimal 255 karakter',
            'alamat.required' => 'Alamat Ranting harus diisi',
            'alamat.string' => 'Alamat Ranting harus berupa string',
            'alamat.max' => 'Alamat Ranting maksimal 255 karakter',
            'cabang_id.required' => 'Cabang harus diisi',
            'cabang_id.exists' => 'Cabang tidak ditemukan',
        ];
    }
}
