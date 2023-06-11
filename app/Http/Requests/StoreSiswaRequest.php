<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
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
        return [
          'username' => ['required'],
          'password' => ['required'],
          'kelas_id' => ['required'],
          'name' => ['required'],
          'jk' => ['required'],
          'jenispendaftaran' => ['required'],
          'diterimapada' => ['required'],
          'nis' => ['required', 'max:10'],
          'nisn' => ['required', 'max:12'],
          'tempatlahir' => ['required'],
          'tanggallahir' => ['required'],
          'agama' => ['required'],
          'statusdalamkeluarga' => ['required'],
          'anak_ke' => ['required'],
          'alamat' => ['required'],
          // 'telepon' => ['required'],
          // 'namaayah' => ['required'],
          // 'namaibu' => ['required'],
          // 'namawali' => ['required'],
          // 'pekerjaanayah' => ['required'],
          // 'pekerjaanibu' => ['required'],
          // 'pekerjaanwali' => ['required'],
        ];
    }
}
