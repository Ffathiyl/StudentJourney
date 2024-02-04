<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranKegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'Admin_Id',
        'Kegiatan_Id',
        'Mahasiswa_Id',
        'Catatan',
        'Deskripsi_Penolakan',
        'Status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class);
    }

}
