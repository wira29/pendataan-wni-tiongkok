<?php

namespace App\Http\Requests\cabang;

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
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama Cabang harus diisi',
            'nama.string' => 'Nama Cabang harus berupa string',
            'nama.max' => 'Nama Cabang maksimal 255 karakter',
            'alamat.required' => 'Alamat Cabang harus diisi',
            'alamat.string' => 'Alamat Cabang harus berupa string',
            'alamat.max' => 'Alamat Cabang maksimal 255 karakter',
        ];
    }
}
