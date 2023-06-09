<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrasiRequest extends FormRequest
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
            'email' => ['required','email','unique:users'],
            'password' => ['required','min:8','max:255'],
            'nama' => ['required','unique:users','regex:/^[a-zA-Z\s]*$/'],
            'tanggal_daftar' => ['required'],
            'captcha' => ['required','captcha']
        ];
    }
}
