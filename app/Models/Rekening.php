<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'id_rekenings',
        'nama_rekening',
        'kode_rekening',
        'persen_tarif'
    ];

    protected $table = 'rekenings';

    public function objekpajak(){
        return $this->hasMany(Rekening::class,'id_rekening','id');
    }
}
