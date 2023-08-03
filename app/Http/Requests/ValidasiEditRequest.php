<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ValidasiEditRequest extends FormRequest
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
            
            'id_kecamatan' => ['required'],
            'id_kelurahan' => ['required'],
            'tanggal_daftar' => ['required'],
            'no_pendaftaran' => ['required'],
            'jenis_pendapatan' => ['required'],
            'jenis_usaha' => ['required'],
            'nik' => ['required','max:16'],
            'nama' => ['required','max:255','regex:/^[\pL\s\-]+$/u',Rule::unique('wajib_pajak')->ignore($this->wajibpajak->id)],
            'alamat' => ['required','max:255'],
            'rt' => ['required','numeric'],
            'rw' => ['required','numeric'],
            'kabupaten' => ['required'],
            'no_telpon' => ['required','max:13'],
            'kode_pos' => ['required','max:5'],
            'email' => ['required'],
            'foto' => ['image','mimes:jpg,png,jpeg','max:2048'],
        ];
    }
}
