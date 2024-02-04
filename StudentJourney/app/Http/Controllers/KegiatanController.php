<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKegiatanRequest;
use App\Http\Requests\UpdateKegiatanRequest;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();

        return view('kegiatans.index',['kegiatans'=>$kegiatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kegiatans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Session::flash('Deskripsi', $request->Deskripsi);
        Session::flash('Kapasitas', $request->Kapasitas);
        Session::flash('Tanggal_Mulai', $request->Tanggal_Mulai);
        Session::flash('Tanggal_Selesai', $request->Tanggal_Selesai);

        $data = $request->validate([
            'Deskripsi' => ['required'],
            'Kapasitas' => ['required', 'numeric'],
            'Tanggal_Mulai' => ['required', 'date', 'after_or_equal:today'],
            'Tanggal_Selesai' => ['required', 'date', 'after_or_equal:Tanggal_Mulai'],
        ], [
            'Deskripsi.required' => 'Deskripsi wajib diisi.',
            'Kapasitas.required' => 'Kapasitas wajib diisi.',
            'Kapasitas.numeric' => 'Kapasitas harus berupa angka.',
            'Tanggal_Mulai.required' => 'Tanggal Mulai wajib diisi.',
            'Tanggal_Mulai.after_or_equal' => 'Tanggal dan Waktu Mulai tidak boleh kurang dari hari ini.',
            'Tanggal_Selesai.required' => 'Tanggal dan Waktu Selesai wajib diisi.',
            'Tanggal_Selesai.after_or_equal' => 'Tanggal dan Waktu Selesai harus setelah atau sama dengan Tanggal Mulai.',
        ]);

        // $param = $request->validated();
        if ($kegiatan = Kegiatan::create($data)) {
            $kegiatan->save();
            return redirect(route('kegiatans.index'))->with('success', 'Data Kegiatan Berhasil Ditambahkan!');
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
        $kegiatan = Kegiatan::findOrFail($id);

        return view('kegiatans.edit',['kegiatans'=> $kegiatan]);
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
        $kegiatan = Kegiatan::findOrFail($id);

        $data = $request->validate([
            'Deskripsi' => ['required'],
            'Kapasitas' => ['required', 'numeric'],
            'Tanggal_Mulai' => ['required', 'date'],
            'Tanggal_Selesai' => ['required', 'date', 'after_or_equal:Tanggal_Mulai'],
        ], [
            'Deskripsi.required' => 'Deskripsi wajib diisi.',
            'Kapasitas.required' => 'Kapasitas wajib diisi.',
            'Kapasitas.numeric' => 'Kapasitas harus berupa angka.',
            'Tanggal_Mulai.required' => 'Tanggal dan Waktu Mulai wajib diisi.',
            'Tanggal_Selesai.required' => 'Tanggal dan Waktu Selesai wajib diisi.',
            'Tanggal_Selesai.after_or_equal' => 'Tanggal dan Waktu Selesai harus setelah atau sama dengan Tanggal Mulai.',
        ]);
        $data['Status'] = $request->Status;

        // $params = $request->validated();

        if ($kegiatan->update($data)) {
            $kegiatan->save();

            return redirect(route('kegiatans.index'))->with('success', 'Data Kegiatan Berhasil Diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Kegiatan::where('id',$id)->firstOrFail();

        if($admin->update(['Status' => 0])){
            return redirect(route('kegiatans.index'))->with('success', 'Deleted!');
        } else {
            return redirect(route('kegiatans.index'))->with('error', 'Gagal Hapus Data!');
        }
    }
}
