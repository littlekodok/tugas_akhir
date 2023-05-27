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

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'id_kecamatans','id');
    }
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'id_kelurahans','id');
    }
    public function users(){
        return $this->belongsTo(User::class,'id_users','id');
    }
}
