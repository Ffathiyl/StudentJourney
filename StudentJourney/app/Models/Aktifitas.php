<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktifitas extends Model
{
    use HasFactory;
    protected $fillable = [
        'Deskripsi',
        'Jam_Plus',
        'Jam_Minus',
        'Mahasiswa_Id',
        'Admin_Id',
        'Tanggal',
        'Status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
