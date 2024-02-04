<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePendaftaranRequest;
use App\Models\Admin;
use App\Models\Kegiatan;
use App\Models\Mahasiswa;
use App\Models\PendaftaranKegiatan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftaran = PendaftaranKegiatan::all()->where('status','!=','Dibatalkan')
        ->where('status','!=','Ditolak')
        ->where('status','!=','Pengajuan Diterima');

        return view('pengajuans.index', ['pengajuans' => $pendaftaran]);
    }

    public function indexs(Request $request)
    {
        $logged_in = $request->session()->get('logged_mhs');
        $pendaftaran = PendaftaranKegiatan::where('mahasiswa_id', $logged_in->id)
            ->where('Status', '!=', 'Dibatalkan')
            ->where('Status', '!=', 'Pengajuan Diterima')
            ->get();        // $pengajuan = Pengajuan::where('pendaftaran_kegiatan_id', $logged_in->NIM)->get();

        $pengajuan = Pengajuan::join('pendaftaran_kegiatans', 'pengajuans.pendaftaran_kegiatan_id', '=', 'pendaftaran_kegiatans.id')
            ->where('pendaftaran_kegiatans.mahasiswa_id', $logged_in->id)
            ->with('pendaftaranKegiatan.mahasiswa')
            ->get();


        return view('pengajuans.history', ['pengajuans' => $pengajuan, 'pendaftarans' => $pendaftaran]);
    }

    public function indexPend()
    {
        $pendaftaran = PendaftaranKegiatan::all()->where('status', 'Menunggu Persetujuan PIC');

        return view('pendaftarans.index', ['pendaftarans' => $pendaftaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajuans.create');
    }

    public function createPend()
    {
        $kegiatan = Kegiatan::where('Status', 'Sedang Dikerjakan')->get()->pluck('Deskripsi', 'id');

        return view('pengajuans.pendaftaran', ['kegiatans' => $kegiatan]);
    }

    public function getTanggal(Request $request)
    {
        $kegiatanId = $request->input('kegiatan_id');
        $kegiatan = Kegiatan::where('id', $kegiatanId)->get();
        return response()->json($kegiatan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function storePend(Request $request)
    {
        // $request->validate([
        //     'Kegiatan_Id' => ['required'],
        //     'Catatan' => ['required'],
        // ], [
        //     'Kegiatan_Id.required' => 'Pilih Kegiatan!',
        //     'Catatan.required' => 'Isi Catatan!', 
        // ]);

        // dd($request->Kegiatan_id);
        if($request->Kegiatan_Id == null){
            return redirect()->back()->with('error', 'Anda Belum Memilih Kegiatan.');
        } elseif($request->Catatan == null){
            return redirect()->back()->with('error', 'Catatan Wajib diisi.');
        }
        // DB::enableQueryLog();
        try {
            $kegiatan = Kegiatan::findOrFail($request->Kegiatan_Id);
            $admin = Session::get('logged_in')->id;
            // dd($kegiatan->Kapasitas - 1);

            $existingPendaftaran = PendaftaranKegiatan::where([
                'Mahasiswa_Id' => $request->input('Mahasiswa_Id'),
                'Kegiatan_Id' => $request->input('Kegiatan_Id'),
            ])->where('Status', '!=', 'Dibatalkan')->first();

            if ($existingPendaftaran) {
                return redirect()->back()->with('error', 'Anda sudah mendaftar untuk kegiatan ini sebelumnya.');
            }

            if ($kegiatan->Kapasitas > 0) {
                // return $kegiatan->Kapasitas - 1;
                // $param = $request->validated();
                $param['Mahasiswa_Id'] = $request->Mahasiswa_Id;
                $param['Kegiatan_Id'] = $request->Kegiatan_Id;
                $param['Catatan'] = $request->Catatan;
                $param['Admin_Id'] = $admin;
                $param['Deskripsi_Penolakan'] = null;
                $param['Status'] = $request->Status;
                // dd($param);
                $pendaftaran = PendaftaranKegiatan::create($param);
                $pendaftaran->save();
                // dd(DB::getQueryLog());
                return redirect(route('pengajuans.indexs'))->with('successPend', 'Pendaftaran Berhasil!');
            } else {
                return redirect()->back()->with('error', 'Maaf, kapasitas kegiatan sudah penuh.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendaftaran = PendaftaranKegiatan::findOrFail($id);

        return view('pengajuans.create', ['pendaftarans' => $pendaftaran]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPend($id)
    {
        $pendaftaran = PendaftaranKegiatan::where('id', $id)->firstOrFail();
        $kegiatan = Kegiatan::findOrFail($pendaftaran->kegiatan_id);
        // dd($kegiatan->Kapasitas + 1);

        if ($pendaftaran->update(['Status' => 'Dibatalkan'])) {
            if($pendaftaran->status != "Menunggu Persetujuan PIC")
            Kegiatan::where('id', $pendaftaran->kegiatan_id)->update(['Kapasitas' => $kegiatan->Kapasitas + 1]);
            return redirect(route('pengajuans.indexs'))->with('successPend', 'Kegiatan Dibatalkan!');
        } else {
            return redirect(route('pengajuans.indexs'))->with('errorPend', 'Gagal Hapus Data!');
        }
    }

    public function Mengajukan($id)
    {
        $pendaftaran = PendaftaranKegiatan::where('id', $id);

        if ($pendaftaran->update(['Status' => 'Menunggu Proses Pengajuan'])) {
            return redirect(route('pengajuans.indexs'))->with('successPend', 'Pengajuan Berhasil Dikirim.');
        } else {
            return redirect(route('pengajuans.indexs'))->with('errorPend', 'Gagal Mengirim Pengajuan!');
        }
    }

    public function Pengajuan(Request $request, $id)
    {
        $pendaftaran = PendaftaranKegiatan::where('id', $id)->first();
        $admin = Session::get('logged_in')->id;
        $mahasiswa = $pendaftaran->mahasiswa;
        $jp = $mahasiswa->Jam_Plus;
        $newJp = $jp + $request->input('Jam_Plus');
        // dd($newJp);

        $request->validate([
            'Jam_Plus' => 'required',
            'Status' => 'required',
        ]);

        $data = [
            'Jam_Plus' => $request->input('Jam_Plus'),
            'Catatan' => $request->input('Catatan'),
            'pendaftaran_kegiatan_id' => $id,
            'Tanggal_Pengajuan' => now(),
            'Status' => $request->input('Status'),
            'admin_id' => $admin,
        ];

        if ($pengajuan = Pengajuan::create($data)) {
            $pengajuan->save();
            PendaftaranKegiatan::where('id', $id)->update(['status' => 'Pengajuan Diterima']);
            $mahasiswa->update(['Jam_Plus' => $newJp]);
            return redirect(route('pengajuans.index'))->with('success', 'Berhasil Menerima Pengajuan!');
        } else {
            return redirect(route('pengajuans.index'))->with('error', 'Gagal Menerima Pengajuan!');
        }
    }

    public function TolakPengajuan(Request $request)
    {

        $pendaftaran = PendaftaranKegiatan::where('id', $request->pend)->first();

        if ($pendaftaran->update(['Status' => 'Ditolak', 'Deskripsi_Penolakan' => $request->Deskripsi_Penolakan])) {
            return redirect(route('pengajuans.index'))->with('successPend', 'Pengajuan Berhasil Dikirim.');
        } else {
            return redirect(route('pengajuans.index'))->with('errorPend', 'Gagal Mengirim Pengajuan!');
        }
    }
}
