<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRfidRequest;
use App\Http\Requests\UpdateRfidRequest;
use App\Models\Mahasiswa;
use App\Models\Rfid;
use Illuminate\Http\Request;

class RfidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rfid = Rfid::all()->where('Status','1');

        return view('rfids.index',['rfids'=>$rfid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::orderBy('Nama', 'asc')->where('status', '=', '1')->get()->pluck('Nama', 'id');
        return view('rfids.create',['mahasiswas'=>$mahasiswa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRfidRequest $request)
    {
        $param = $request->validated();
        if ($rfid = Rfid::create($param)) {
            $rfid->save();
            return redirect(route('rfids.index'))->with('success', 'Added!');
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
    public function edit($rfid)
    {
        $mahasiswa = Mahasiswa::orderBy('Nama', 'asc')->where('status', '=', '1')->get()->pluck('Nama', 'id');
        $rfid = Rfid::where('RFID',$rfid)->firstOrFail();
        return view('rfids.edit',['rfids'=>$rfid,'mahasiswas'=>$mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRfidRequest $request, $rfid)
    {
        $rfid = Rfid::where('RFID',$rfid)->firstOrFail();
        $params = $request->validated();

        if ($rfid->update($params)) {
            $rfid->save();

            return redirect(route('rfids.index'))->with('success', 'Data Berhasil Diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rfid)
    {
        $rfid = Rfid::where('RFID',$rfid)->firstOrFail();

        if($rfid->update(['Status' => 0])){
            return redirect(route('rfids.index'))->with('success', 'Deleted!');
        } else {
            return redirect(route('rfids.index'))->with('error', 'Gagal Hapus Data!');
        }
    }
}
