<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekPajak extends Model
{
    use HasFactory;

    protected $fillable = [
            'id_wajib_pajak',
            'id_jenis_pajak',
            'id_rekening' ,
            'id_kecamatan' ,
            'id_kelurahan' ,
            'tanggal_daftar_objek',
            'no_objek',
            'nama_objek',
            'alamat_objek',
            'rt_objek',
            'rw_objek',
            'kode_pos_objek',
            'latitude',
            'longitude',
            'validasi' ,
            'keterangan'
    ];

    protected $table = 'objek_pajaks';
    
    public function wajibpajak(){
        return $this->belongsTo(WajibPajak::class,'id_wajib_pajak','id');
    }
    public function jenispajak(){
        return $this->belongsTo(JenisPajak::class,'id_jenis_pajak','id');
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'id_kecamatan','id');
    }
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'id_kelurahan','id');
    }
    public function rekening(){
        return $this->belongsTo(Rekening::class,'id_rekening','id');
    }
    public function fotoobjekpajak(){
        return $this->hasMany(FotoObjekPajak::class,'id_objek_pajak','id');
    }
    public function transaksi(){
        return $this->hasMany(Transaksi::class,'id_objek_pajak','id');
    }
}
