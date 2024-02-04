<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();

        return view('admins.index',['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Session::flash('Username', $request->Username);
        Session::flash('Password', $request->Password);
        Session::flash('Nama', $request->Nama);
        Session::flash('Nohp', $request->Nohp);
        Session::flash('Role', $request->Role);
        Session::flash('Kelamin', $request->Kelamin);

        $data = $request->validate([
            'Nama' => ['required','unique:admins'],
            'Nohp' => ['required', 'numeric', 'unique:admins'],
            'Kelamin' => ['required'],
            'Username' => ['required', 'unique:admins'],
            'Password' => ['required'],
            'Role' => ['required'],
        ], [
            'Nama.required' => 'Nama wajib diisi.',
            'Nohp.required' => 'Nomor Handphone wajib diisi.',
            'Nohp.numeric' => 'Nomor Handphone harus berupa angka.',
            'Nohp.unique' => 'Nomor Handphone sudah digunakan.',
            'Kelamin.required' => 'Jenis Kelamin wajib diisi.',
            'Username.required' => 'Username wajib diisi.',
            'Username.unique' => 'Username sudah digunakan.',
            'Nama.unique' => 'Nama sudah digunakan.',
            'Password.required' => 'Password wajib diisi.',
            'Role.required' => 'Role wajib diisi.',
        ]);

        $data['Password'] = Hash::make($request->Password);
        // dd($data);

        if ($admin = Admin::create($data)) {
            $admin->save();
            return redirect(route('admins.index'))->with('success', 'Data Admin Berhasil Ditambahkan!');
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
        $admin = Admin::findOrFail($id);
        return view('admins.edit', ['admin' => $admin]);
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
        // dd($id);
        $admin = Admin::findOrFail($id);

        $data = $request->validate([
            'Nama' => ['required', Rule::unique('admins')->ignore($admin->id)],
            'Nohp' => ['required', 'numeric'],
            'Kelamin' => ['required'],
            'Username' => ['required', Rule::unique('admins')->ignore($admin->id)],
            'Password' => ['required'],
            'Role' => ['required'],
        ], [
            'Nama.required' => 'Nama wajib diisi.',
            'Nohp.required' => 'Nomor Handphone wajib diisi.',
            'Nohp.numeric' => 'Nomor Handphone harus berupa angka.',
            'Kelamin.required' => 'Jenis Kelamin wajib diisi.',
            'Username.required' => 'Username wajib diisi.',
            'Username.unique' => 'Username sudah digunakan.',
            'Nama.unique' => 'Nama sudah digunakan.',
            'Password.required' => 'Password wajib diisi.',
            'Role.required' => 'Role wajib diisi.',
        ]);

        // $params = $request->validated();
        // dd($admin->Password);
        if($request->Password == $admin->Password){
            $data['Password'] == $admin->Password;
        }else{
            $data['Password'] = Hash::make($request->input('Password'));
        }
        // dd(Hash::make($data['Password']));
        // dd($data);
    //    dd($admin);
        if ($admin->update($data)) {
            $admin->save();

            return redirect(route('admins.index'))->with('success', 'Data Berhasil Diperbarui!');
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
        $admin = Admin::where('id',$id)->firstOrFail();

        if($admin->update(['Status' => 0])){
            return redirect(route('admins.index'))->with('success', 'Data Berhasil Dihapus!');
        } else {
            return redirect(route('admins.index'))->with('error', 'Gagal Hapus Data!');
        }
    }

    public function recovery($id)
    {
        $admin = Admin::where('id',$id)->firstOrFail();

        if($admin->update(['Status' => 1])){
            return redirect(route('admins.index'))->with('success', 'Data Berhasil Diaktifkan!');
        } else {
            return redirect(route('admins.index'))->with('error', 'Gagal Mengaktifkan!');
        }
    }
}