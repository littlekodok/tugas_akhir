<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekPajak extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $table = 'objek_pajaks';
    
    public function jenispajak(){
        return $this->belongsTo(JenisPajak::class,'id_jenis_pajak','id');
    }
    public function kecamatan(){
        return $this->belongsTo(JenisPajak::class,'id_kecamatan','id');
    }
    public function kelurahan(){
        return $this->belongsTo(JenisPajak::class,'id_kelurahan','id');
    }
    public function rekening(){
        return $this->belongsTo(Rekening::class,'id_rekening','id');
    }
}
