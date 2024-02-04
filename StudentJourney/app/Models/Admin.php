<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'Nama',
        'Nohp',
        'Kelamin',
        'Username',
        'Password',
        'Role',
        'Status',
    ];

    public function pengajuans(){
        return $this->hasMany(Pengajuan::class,'id');
    }

    public function pendaftarans(){
        return $this->hasMany(PendaftaranKegiatan::class,'id');
    }

    public function aktifitass(){
        return $this->hasMany(Aktifitas::class,'id');
    }

}
