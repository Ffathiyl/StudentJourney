<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'NIM',
        'Nama',
        'RFID',
        'PIN',
        'Jenis_Kelamin',
        'Jam_Plus',
        'Jam_Minus',
        'Soft_Skill',
        'Status',
    ];

    public function PendaftaranKegiatans(){
        return $this->hasMany(PendaftaranKegiatan::class,'id');
    }

    public function aktifitass(){
        return $this->hasMany(Aktifitas::class,'id');
    }

}
