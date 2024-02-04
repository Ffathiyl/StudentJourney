<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all()->where('Status','1');

        return view('mahasiswas.index',['mahasiswas'=>$mahasiswas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Flash data to session
        Session::flash('NIM', $request->NIM);
        Session::flash('Nama', $request->Nama);
        Session::flash('Jenis_Kelamin', $request->Jenis_Kelamin);
        Session::flash('PIN', $request->PIN);
        Session::flash('RFID', $request->RFID);
    
        // Validate the request data
        $data = $request->validate([
            'NIM' => ['required', 'unique:mahasiswas'],
            'Nama' => ['required'],
            'Jenis_Kelamin' => ['required'],
            'PIN' => ['required','digits:6'],
            'RFID' => ['required', 'unique:mahasiswas'],
        ], [
            'NIM.required' => 'NIM wajib diisi.',
            'NIM.unique' => 'NIM sudah digunakan.',
            'Nama.required' => 'Nama wajib diisi.',
            'Jenis_Kelamin.required' => 'Jenis Kelamin wajib diisi.',
            'PIN.required' => 'PIN wajib diisi.',
            'PIN.digits' => 'PIN harus 6 angka.',
            'RFID.required' => 'RFID wajib diisi.',
            'RFID.unique' => 'RFID sudah digunakan.',
        ]);

        $data['Jam_Plus'] = 0;
        $data['Jam_Minus'] = 0;
        $data['Soft_Skill'] = 0;
        $data['PIN'] = Hash::make($request->PIN);

        if ($mahasiswa = Mahasiswa::create($data)) {
            $mahasiswa->save();
    
            return redirect(route('mahasiswas.index'))->with('success', 'Data Mahasiswa Berhasil Ditambahkan!');
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswas.edit',['mahasiswa'=>$mahasiswa]);
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        $pinb = $mahasiswa->PIN;
        
        if($pinb != $request->PIN){
            $request->validate([
                'PIN' => ['digits:6'],
            ], [
                'PIN.digits' => 'PIN Harus 6 angka atau digit',
            ]);
        }

        $data = $request->validate([
            'NIM' => ['required', Rule::unique('mahasiswas')->ignore($mahasiswa->id)],
            'Nama' => ['required'],
            'Jenis_Kelamin' => ['required'],
            'PIN' => ['required'],
            'RFID' => ['required', Rule::unique('mahasiswas')->ignore($mahasiswa->id)],
        ], [
            'NIM.required' => 'NIM wajib diisi.',
            'NIM.unique' => 'NIM sudah digunakan.',
            'Nama.required' => 'Nama wajib diisi.',
            'Jenis_Kelamin.required' => 'Jenis Kelamin wajib diisi.',
            'PIN.required' => 'PIN wajib diisi.',
            'RFID.required' => 'RFID wajib diisi.',
            'RFID.unique' => 'RFID sudah digunakan.',
        ]);
        // $params = $request->validated();

        if($request->PIN == $mahasiswa->PIN){
            $data['PIN'] == $mahasiswa->PIN;
        }else{
            $data['PIN'] = Hash::make($request->input('PIN'));
        }

        if ($mahasiswa->update($data)) {
            $mahasiswa->save();

            return redirect(route('mahasiswas.index'))->with('success', 'Data Berhasil Diperbarui!');
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
        $mahasiswa = Mahasiswa::where('id',$id)->firstOrFail();

        if($mahasiswa->update(['Status' => 0])){
            return redirect(route('mahasiswas.index'))->with('success', 'Data Berhasil Dihapus!');
        } else {
            return redirect(route('mahasiswas.index'))->with('error', 'Gagal Hapus Data!');
        }
    }
}