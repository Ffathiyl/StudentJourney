<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use App\Models\Pengurus;
use App\Models\TransaksiPenilaian;

use Illuminate\Http\Request;
use App\Http\Requests\DivisiStoreRequest;
use App\Http\Requests\DivisiUpdateRequest;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';

        // Menghitung jumlah total organisasi
        $totalOrganisasi = Organisasi::where('status', 1)->count();

        $totalAnggotaBem = Pengurus::where('organisasi_id', 1)->where('status', 2)->count();

        $totalAnggotaMpm = Pengurus::where('organisasi_id', 2)->where('status', 2)->count();

        $totalPengurus = Pengurus::where('status', 2)->count();

        return view('Dashboard.dashboard', compact('title', 'totalOrganisasi', 'totalAnggotaBem', 'totalAnggotaMpm','totalPengurus'));
    }

    public function indexp($Nim)
    {
        $title = "Detail Laporan Mahasiswa";
        $penguruses = TransaksiPenilaian::where('pengurus_id', $Nim)->get();

        $jumlahData = count($penguruses);
        $totalIntegritas = 0;
        $totalHandal = 0;
        $totalTangguh = 0;
        $totalKolaborasi = 0;
        $totalInovasi = 0;

        $nama = '';
        $organisasi = '';
        $divisi = '';
        $jabatan = '';
        $prodi = '';

        foreach ($penguruses as $nilai) {
            $totalIntegritas += $nilai->integritas;
            $totalHandal += $nilai->handal;
            $totalTangguh += $nilai->tangguh;
            $totalKolaborasi += $nilai->kolaborasi;
            $totalInovasi += $nilai->inovasi;
            
            // Ambil data pengurus terkait
            $pengurus = $nilai->pengurus;
            $apresiasi = '';
            $evaluasi = '';

            if ($pengurus) {
                $nama = $pengurus->Nama;
                $organisasi = $pengurus->organisasi->nama_organisasi ?? '';
                $divisi = $pengurus->divisi->nama_divisi ?? '';
                $jabatan = $pengurus->jabatan->nama_jabatan ?? '';
                $prodi = $pengurus->prodi->nama_program_studi ?? '';
                $apresiasi = $nilai->apresiasi; 
                $evaluasi = $nilai->evaluasi;
            }
        }

        $rataRata = [
            'integritas' => ($jumlahData > 0) ? $totalIntegritas / $jumlahData : 0,
            'handal' => ($jumlahData > 0) ? $totalHandal / $jumlahData : 0,
            'tangguh' => ($jumlahData > 0) ? $totalTangguh / $jumlahData : 0,
            'kolaborasi' => ($jumlahData > 0) ? $totalKolaborasi / $jumlahData : 0,
            'inovasi' => ($jumlahData > 0) ? $totalInovasi / $jumlahData : 0,
        ];

        $eval = [
            'apresiasi' => $apresiasi,
            'evaluasi' => $evaluasi,
        ];
    
      
        return view('Dashboard.dashboard_pengurus', compact('title', 'penguruses', 'rataRata','eval'));
    
    }
    

}