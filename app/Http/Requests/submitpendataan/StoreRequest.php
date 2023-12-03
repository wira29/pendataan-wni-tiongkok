<?php

namespace App\Http\Requests\submitpendataan;

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
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'keperluan' => 'required|string',
            'no_hp_tiongkok' => 'required|string',
            'no_paspor' => 'required|string',
            'masa_berlaku_paspor' => 'required|date',
            'no_visa' => 'required|string',
            'masa_berlaku_visa' => 'required|date',
            'nama_kontak_darurat' => 'required|string',
            'no_kontak_darurat' => 'required|string',
            'hubungan_kontak_darurat' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tempat_lahir.string' => 'Tempat lahir harus berupa string',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal',
            'keperluan.required' => 'Keperluan harus diisi',
            'keperluan.string' => 'Keperluan harus berupa string',
            'no_hp_tiongkok.required' => 'No HP Tiongkok harus diisi',
            'no_hp_tiongkok.string' => 'No HP Tiongkok harus berupa string',
            'no_paspor.required' => 'No Paspor harus diisi',
            'no_paspor.string' => 'No Paspor harus berupa string',
            'masa_berlaku_paspor.required' => 'Masa berlaku paspor harus diisi',
            'masa_berlaku_paspor.date' => 'Masa berlaku paspor harus berupa tanggal',
            'no_visa.required' => 'No Visa harus diisi',
            'no_visa.string' => 'No Visa harus berupa string',
            'masa_berlaku_visa.required' => 'Masa berlaku visa harus diisi',
            'masa_berlaku_visa.date' => 'Masa berlaku visa harus berupa tanggal',
            'nama_kontak_darurat.required' => 'Nama kontak darurat harus diisi',
            'nama_kontak_darurat.string' => 'Nama kontak darurat harus berupa string',
            'no_kontak_darurat.required' => 'No kontak darurat harus diisi',
            'no_kontak_darurat.string' => 'No kontak darurat harus berupa string',
            'hubungan_kontak_darurat.required' => 'Hubungan kontak darurat harus diisi',
            'hubungan_kontak_darurat.string' => 'Hubungan kontak darurat harus berupa string',
            
        ];
    }
}
