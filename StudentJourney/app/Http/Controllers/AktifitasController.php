<?php

namespace App\Http\Controllers;

use App\Models\Aktifitas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AktifitasController extends Controller
{
    //

    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('Nama', 'asc')->where('status', '=', '1')->get()->pluck('Nama', 'id');
        $aktifitas = Aktifitas::all()->where('Status','Aktif');

        return view('aktifitas.index', ['aktifitass' => $aktifitas, 'mahasiswas' => $mahasiswa]);
    }

    public function store(Request $request)
    {
        $plus = 0;
        $minus = 0;
        $validator = Validator::make($request->all(), [
            'Deskripsi' => 'required',
            'Mahasiswa_Id' => 'required',
        ], [
            'Deskripsi.required' => 'Deskripsi wajib diisi.',
            'Mahasiswa_Id.required' => 'Mahasiswa wajib diisi.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal Menambahkan Data');
        }

        //TESTING
        // dd($request->Total);

        if($request->Jam == "Plus"){
            $plus = $request->Total;
        } else {
            $minus = $request->Total;
        }
        // dd($minus);

        // dd($request->Mahasiswa_Id);
        $mahasiswa = Mahasiswa::where('id', $request->Mahasiswa_Id)->first();
        $admin = Session::get('logged_in')->id;
        $jp = $mahasiswa->Jam_Plus;
        $jm = $mahasiswa->Jam_Minus;

        $data = [
            'Deskripsi' => $request->input('Deskripsi'),
            'Mahasiswa_Id' => $request->input('Mahasiswa_Id'),
            'Jam_Plus' => $plus,
            'Jam_Minus' => $minus,
            'Tanggal' => now(),
            'Status' => 'Aktif',
            'Admin_Id' => $admin,
        ];
        // dd($data);
        if ($request->Jam_Plus != null && $request->Jam_Minus != null) {
            return back()->with('error', 'Isi Salah Satu!');
        }

        if ($aktifitas = Aktifitas::create($data)) {
            if ($request->Jam == "Plus") {
                $newjp = $jp + $plus;
                $mahasiswa->Update(['Jam_Plus' => $newjp]);
                $mahasiswa->save();
            } elseif ($request->Jam == "Minus") {
                $newjm = $jm + $minus;
                $mahasiswa->Update(['Jam_Minus' => $newjm]);
                $mahasiswa->save();
            }
            $aktifitas->save();
            return redirect(route('aktifitas.index'))->with('success', 'Aktifitas Berhasil Ditambahkan!');
        }
    }

    public function destroy($id){
        $aktifitas = Aktifitas::where('id',$id)->first();
        $mahasiswa = $aktifitas->mahasiswa;
        $jp = $mahasiswa->Jam_Plus;
        $jm = $mahasiswa->Jam_Minus;
        $newjp = $jp - $aktifitas->Jam_Plus;
        $newjm = $jm - $aktifitas->Jam_Minus;
        // dd($newjm);

        if($aktifitas->update(['Status' => 'Tidak Aktif'])){
            if($mahasiswa->update(['Jam_Plus' => $newjp, 'Jam_Minus' => $newjm])){
                return redirect(route('aktifitas.index'))->with('success', 'Aktifitas Berhasil Dihapus!');
            } else {
                return redirect(route('aktifitas.index'))->with('error', 'Gagal Mengupdate Jam!');
            }
        } else {
            return redirect(route('aktifitas.index'))->with('error', 'Gagal Menghapus Aktifitas!');
        }
    }
}
