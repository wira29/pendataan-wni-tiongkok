<?php

namespace App\Http\Requests\submitpembaruan;

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
            'file' => 'required|file|mimes:rar|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'File harus diisi',
            'file.file' => 'File harus berupa file',
            'file.mimes' => 'File harus berupa file dengan format rar',
            'file.max' => 'File maksimal 2MB',
        ];
    }
}
