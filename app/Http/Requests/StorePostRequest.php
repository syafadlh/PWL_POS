<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'kategori_kode' => 'required|string|max:2',
            'kategori_nama' => 'required|string|min:3',
            'username' => 'required|unique:m_user,username',
            'nama' => 'required|string',
            'password' => 'required|min:6',
            'level_id' => 'required|exists:m_level,level_id',
            'level_kode' => 'required|string|max:5|unique:m_level,level_kode',
            'level_nama' => 'required|string|min:3',
        ];
    }
}