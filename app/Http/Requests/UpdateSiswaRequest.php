<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->role == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => ['required'],
          'jk' => ['required'],
          'jenispendaftaran' => ['required'],
          'diterimapada' => ['required'],
          'nis' => ['required'],
          'nisn' => ['required'],
          'tempatlahir' => ['required'],
          'tanggallahir' => ['required'],
          'agama' => ['required'],
          'statusdalamkeluarga' => ['required'],
          'anak_ke' => ['required'],
          'alamat' => ['required'],
          'status' => ['required'],
        ];
    }
}