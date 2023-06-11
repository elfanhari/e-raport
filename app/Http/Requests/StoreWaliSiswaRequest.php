<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWaliSiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $unique = Rule::unique('users')->ignore($this->id); // Pengeculian Unique Saat Update

        return [
          'username' => ['required', $unique],
          'password' => ['required'],
          'user_id' => ['required'],
          'siswa_id' => ['required'],
          'name' => ['required'],
          'jk' => ['required'],
          'sebagai' => ['required'],
        ];
    }
}
