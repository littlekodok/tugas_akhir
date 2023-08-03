<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WajibPajak extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $table = 'wajib_pajak';

    public function objekpajak(){
        return $this->hasMany(ObjekPajak::class,'id_wajib_pajak','id');
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'id_kecamatan','id');
    }
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'id_kelurahan','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }
    public function fotoobjekpajak(){
        return $this->hasOne(FotoObjekPajak::class,'id_wajib_pajak','id');
    }
}
