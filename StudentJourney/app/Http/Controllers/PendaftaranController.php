<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\PendaftaranKegiatan;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    //

    public function index()
    {
        $pendaftaran = PendaftaranKegiatan::all()->where('status','!=','Pengajuan Diterima')->where('status','!=','Dibatalkan');
        // dd($pendaftaran);
        return view('pendaftarans.index', ['pendaftarans' => $pendaftaran]);
        
    }

    public function Approval($id){
        $pendaftaran = PendaftaranKegiatan::where('id',$id)->first();
        $kegiatan = $pendaftaran->kegiatan;
        // dd($kegiatan->Kapasitas);

        if($pendaftaran->update(['Status' => 'Disetujui'])){
            $kegiatan->update(['Kapasitas' => $kegiatan->Kapasitas - 1]);
            return redirect(route('pendaftarans.index'))->with('success', 'Pengajuan Berhasil Diterima.');
        } else {
            return redirect(route('pendaftarans.index'))->with('error', 'Gagal Menerima Pengajuan!');
        }
    }
}