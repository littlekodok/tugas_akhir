<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    protected $table = 'transaksi';

    public function wajibpajak(){
        return $this->belongsTo(WajibPajak::class,'id_wajib_pajak','id');
    }
    public function objekpajak(){
        return $this->belongsTo(ObjekPajak::class,'id_objek_pajak','id');
    }
    public function jenispajak(){
        return $this->belongsTo(JenisPajak::class,'id_jenis_pajak','id');
    }
    public function rekening(){
        return $this->belongSTo(Rekening::class,'id_rekening','id');
    }
}
