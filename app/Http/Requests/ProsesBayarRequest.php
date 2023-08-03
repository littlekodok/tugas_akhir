<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProsesBayarRequest extends FormRequest
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
            'bulan_bayar' => ['required'],
            'dasar_pengenaan' => ['required'],
            'no_transaksi'=> ['required'],
            'norek_transaksi' => ['required'],
            'kegiatan' => ['required'],
            'tarif_pajak' => ['required'],
            'total_pajak' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'dasar_pengenaan.required' => 'Kolom Dasar Pengenaan Masih Kosong',
            'no_transaksi.required' => 'Kolom Nomor Transaksi Masih Kosong',
            'norek_transaksi.required' => 'Kolom Nomor Rekening Transaksi Masih Kosong',
            'kegiatan.required' => 'Kolom Keterangan Kegiatan Masih Kosong',
            'bulan_bayar.required' => 'Kolom Bulan Bayar Masih Kosong',
            'tarif_pajak.required' => 'Kolom Tarif Pajak Masih Kosong',
            'total_pajak.required' => 'Kolom Total Pajak Masih Kosong'
        ];
    }
}
