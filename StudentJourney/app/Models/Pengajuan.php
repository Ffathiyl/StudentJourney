<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Pengajuan extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'Jam_Plus',
        'admin_id',
        'Status',
        'Tanggal_Pengajuan',
        'pendaftaran_kegiatan_id',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function pendaftaranKegiatan(){
        return $this->belongsTo(PendaftaranKegiatan::class);
    }
}
