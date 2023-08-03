<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObjekPajakRequest extends FormRequest
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
            'id_jenis_pajak' => ['required'],
            'id_rekening' => ['required'],
            'id_kecamatan' => ['required'],
            'id_kelurahan' => ['required'],
            'tanggal_daftar_objek' => ['required'],
            'no_objek' => ['required'],
            'nama_objek' => ['required'],
            'alamat_objek' => ['required'],
            'rt_objek' => ['required'],
            'rw_objek' => ['required'],
            'kode_pos_objek' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required']

        ];
    }
    public function messages()
    {
        return [
            'id_jenis_pajak.required' => 'Kolom Dasar Pengenaan Masih Kosong',
            'id_rekening.required' => 'Kolom Nomor Transaksi Masih Kosong',
            'norek_transaksi.required' => 'Kolom Nomor Rekening Transaksi Masih Kosong',
            'id_kecamatan.required' => 'Kolom Keterangan Kegiatan Masih Kosong',
            'id_kelurahan.required' => 'Kolom Bulan Bayar Masih Kosong',
            'tarif_pajak.required' => 'Kolom Tarif Pajak Masih Kosong',
            'total_pajak.required' => 'Kolom Total Pajak Masih Kosong'
        ];
    }
}
