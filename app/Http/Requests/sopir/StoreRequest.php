<?php

namespace App\Http\Requests\sopir;


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
            'sim' => 'required|string|max:100',
            'alamat' => 'required|string|max:100',
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
            'nama.required' => 'Nama harus diisi',
            'nama.string' => 'Nama harus berupa string',
            'nama.max' => 'Nama maksimal 100 karakter',
            'sim.required' => 'SIM harus diisi',
            'sim.string' => 'SIM harus berupa string',
            'sim.max' => 'SIM maksimal 100 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat maksimal 100 karakter',
            'gambar.image' => 'Gambar harus berupa gambar',
            'gambar.mimes' => 'Gambar harus berupa gambar dengan format jpg, jpeg, atau png',
            'gambar.max' => 'Gambar maksimal 2MB', 
        ];
    }
}
