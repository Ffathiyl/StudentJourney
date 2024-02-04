<?php

namespace App\Http\Controllers;

use App\Exports\FormExport;
use App\Models\Mahasiswa;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function export($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        // dd($mahasiswa);
        $arr = $mahasiswa->toArray();
        $data = [
            [
                'Nama' => $mahasiswa->Nama,
                'NIM' => $mahasiswa->NIM,
                'Jam_Plus' => $mahasiswa->Jam_Plus,
            ],
        ];

        // dd($data);
        return Excel::download(new FormExport($data), 'Tester.xlsx');
    }

    public function index(Request $request)
    {
        $mahasiswa = Mahasiswa::all()->where('Status','1');

        return view('laporan.index', ['mahasiswas' => $mahasiswa]);
    }

    public function detailLaporan($id)
    {
        $totalPlus = 0;
        $totalMinus = 0;
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        try{
            $pengajuanQuery = DB::table('pengajuans as p')
            ->select('k.Deskripsi as Deskripsi', 'p.Jam_Plus as Jam_Plus', 'p.Tanggal_Pengajuan as Tanggal', DB::raw('0 as Jam_Minus'))
            ->join('pendaftaran_kegiatans as pk', 'p.pendaftaran_kegiatan_id', '=', 'pk.id')
            ->join('kegiatans as k', 'pk.kegiatan_id', '=', 'k.id')
            ->where('pk.mahasiswa_id', 1)
            ->orderBy('p.Tanggal_Pengajuan', 'asc')
            ->get();

        $aktifitasData = DB::table('aktifitas')
            ->select('Deskripsi', 'Tanggal', 'Jam_Plus', 'Jam_Minus')
            ->where('mahasiswa_id', $id)
            ->where('Status', 'Aktif')
            ->orderBy('Tanggal', 'asc')
            ->get();
        }catch(Exception $e){
            \Log::error('Error in your database query: ' . $e->getMessage());
            throw $e;
        }


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

        // dd($pengajuanQuery);

        // dd($hasilGabungan, $totalPlus, $totalMinus);
        return view('laporan.detailLaporan', ['mahasiswas' => $mahasiswa, 'detail' => $hasilGabungan, 'plus'=>$totalPlus, 'minus'=>$totalMinus]);
    }
}
