<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Mahasiswa;
use App\Models\Kegiatan;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;

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

        $totalMahasiswa = Mahasiswa::where('Status', 1)->count();

        // Menghitung jumlah total organisasi
        $totalbelomKegiatan = Kegiatan::where('Status', 'Belum Dikerjakan')->count();

        $totalsedangKegiatan = Kegiatan::where('Status', 'Sedang Dikerjakan')->count();

        $totalsudahKegiatan = Kegiatan::where('Status', 'Sudah Dikerjakan')->count();

        $jamPlusData = Mahasiswa::select('Nama', DB::raw('Jam_Plus - Jam_Minus AS Selisih'))
            ->where('Status', '1')
            ->orderByDesc('Selisih')
            ->take(5)
            ->get();

        return view('Dashboard.dashboard', compact('title', 'totalbelomKegiatan', 'totalMahasiswa', 'totalsedangKegiatan', 'totalsudahKegiatan', 'jamPlusData'));
    }

    public function indexsek()
    {
        $title = 'Dashboard Sekretaris Prodi';

        $totalMahasiswa = Mahasiswa::where('Status', 1)->count();

        // Menghitung jumlah total organisasi
        $totalbelomKegiatan = Kegiatan::where('Status', 'Belum Dikerjakan')->count();

        $totalsedangKegiatan = Kegiatan::where('Status', 'Sedang Dikerjakan')->count();

        $totalsudahKegiatan = Kegiatan::where('Status', 'Sudah Dikerjakan')->count();

        $jamPlusData = Mahasiswa::select('Nama', DB::raw('Jam_Plus - Jam_Minus AS Selisih'))
            ->where('Status', '1')
            ->orderByDesc('Selisih')
            ->take(5)
            ->get();

        return view('Dashboard.dashboardsek', compact('title', 'totalbelomKegiatan', 'totalMahasiswa', 'totalsedangKegiatan', 'totalsudahKegiatan', 'jamPlusData'));
    }

    public function indexp(Request $request)
    {
        $title = 'Dashboard Mahasiswa';



        $nim = $request->session()->get('logged_mhs');

        $jamPlusDataM = Pengajuan::all();
        $mahasiswas = Mahasiswa::where('id', $nim->id)->first();
        // dd($nim->id);

        $totalPlus = 0;
        $totalMinus = 0;
        $pengajuanQuery = DB::table('pengajuans as p')
            ->select('k.Deskripsi as Deskripsi', 'p.Jam_Plus as Jam_Plus', 'p.Tanggal_Pengajuan as Tanggal', DB::raw('null as Jam_Minus'))
            ->join('pendaftaran_kegiatans as pk', 'p.pendaftaran_kegiatan_id', '=', 'pk.id')
            ->join('kegiatans as k', 'pk.kegiatan_id', '=', 'k.id')
            ->where('pk.mahasiswa_id', 1)
            ->orderBy('p.Tanggal_Pengajuan', 'asc')
            ->get();
        // dd($pengajuanQuery);

        $aktifitasData = DB::table('aktifitas')
            ->select('Deskripsi', 'Tanggal', 'Jam_Plus', 'Jam_Minus')
            ->where('mahasiswa_id', $nim->id)
            ->where('Status', 'Aktif')
            ->orderBy('Tanggal', 'asc')
            ->get();

        $pengajuanArray = json_decode(json_encode($pengajuanQuery), true);
        $aktifitasArray = json_decode(json_encode($aktifitasData), true);

        $hasilGabungan = array_merge($pengajuanArray, $aktifitasArray);
        // dd($hasilGabungan);

        usort($hasilGabungan, function ($a, $b) {
            return strtotime($a['Tanggal']) - strtotime($b['Tanggal']);
        });

        foreach ($hasilGabungan as $item) {
            if (!is_null($item['Jam_Plus'])) {
                $totalPlus += $item['Jam_Plus'];
            }
            if (!is_null($item['Jam_Minus'])) {
                $totalMinus += $item['Jam_Minus'];
            }
        }

        return view('Dashboard.dashboardtrl', compact('title', 'jamPlusDataM', 'mahasiswas', 'hasilGabungan', 'totalPlus', 'totalMinus'));

    }

    public function detailJamPM($id)
    {
        $totalPlus = 0;
        $totalMinus = 0;
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        $pengajuanQuery = DB::table('pengajuans')
            ->select('kegiatans.deskripsi as Deskripsi', 'pengajuans.Tanggal_Pengajuan as Tanggal', 'pengajuans.Jam_Plus as Jam_Plus', DB::raw('null as Jam_Minus'))
            ->join('kegiatans', 'pengajuans.pendaftaran_kegiatan_id', '=', 'kegiatans.id')
            ->join('pendaftaran_kegiatans', 'pengajuans.pendaftaran_kegiatan_id', '=', 'pendaftaran_kegiatans.id')
            ->where('pendaftaran_kegiatans.mahasiswa_id', $id)
            ->orderBy('pengajuans.Tanggal_Pengajuan', 'asc')
            ->get();

        $aktifitasData = DB::table('aktifitas')
            ->select('Deskripsi', 'Tanggal', 'Jam_Plus', 'Jam_Minus')
            ->where('mahasiswa_id', $id)
            ->orderBy('Tanggal', 'asc')
            ->get();

        $pengajuanArray = json_decode(json_encode($pengajuanQuery), true);
        $aktifitasArray = json_decode(json_encode($aktifitasData), true);

        $hasilGabungan = array_merge($pengajuanArray, $aktifitasArray);

        usort($hasilGabungan, function ($a, $b) {
            return strtotime($a['Tanggal']) - strtotime($b['Tanggal']);
        });

        foreach ($hasilGabungan as $item) {
            if (!is_null($item['Jam_Plus'])) {
                $totalPlus += $item['Jam_Plus'];
            }
            if (!is_null($item['Jam_Minus'])) {
                $totalMinus += $item['Jam_Minus'];
            }
        }

        // dd($hasilGabungan, $totalPlus, $totalMinus);
        return view('dashboard.detailJamPM', ['mahasiswas' => $mahasiswa, 'detail' => $hasilGabungan, 'plus' => $totalPlus, 'minus' => $totalMinus]);
    }
}