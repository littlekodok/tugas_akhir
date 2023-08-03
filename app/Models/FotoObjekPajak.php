<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoObjekPajak extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $table = 'foto_objek_pajak';
    
    public function wajibpajak(){
        return $this->belongsTo(WajibPajak::class,'id_wajib_pajak','id');
    }
    public function objekpajak(){
        return $this->belongsTo(ObjekPajak::class,'id_objek_pajak','id');
    }
  
}
