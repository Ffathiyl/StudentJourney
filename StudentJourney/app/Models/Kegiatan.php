<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'Deskripsi',
        'Kapasitas',
        'Tanggal_Mulai',
        'Tanggal_Selesai',
        'Status',
    ];

    public function PendaftaranKegiatans()
    {
        return $this->hasMany(PendaftaranKegiatan::class, 'id');
    }

    public static function statusKegiatan()
    {
        $data = Kegiatan::all();

        foreach ($data as $item) {
            if ($item->Tanggal_Selesai && now() > $item->Tanggal_Selesai) {
                $item->update(['Status' => 'Selesai']);
            } elseif ($item->Tanggal_Mulai && now() >= $item->Tanggal_Mulai) {
                $item->update(['Status' => 'Sedang Berlangsung']);
            } else {
                $item->update(['Status' => 'Akan Datang']);
            }
        }
    }
}
