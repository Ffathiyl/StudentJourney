<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('logins.Login');
    }

    public function indexss()
    {
        return view('logins.PageAwal');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * 
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
        //
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
    public function destroy($id)
    {
        //
    }

    public function Login(Request $request)
    {

        Session::flash('username', $request->Username);

        $request->validate([
            'Username' => 'required',
            'Password' => 'required'
        ], [
            'Username.required' => 'Username wajib diisi.',
            'Password.required' => 'Password wajib diisi.'
        ]);

        $info = [
            'username' => $request->get('Username'),
            'password' => $request->get('Password'),
        ];

        $admin = Admin::where('Username', $info['username'])->first();

        if ($admin) {
            if (Hash::check($info['password'], $admin->Password)) {
                if ($admin->Status != 0) {

                    // Autentikasi berhasil
                    Auth::guard('admin')->login($admin);

                    // Menyimpan informasi login
                    $request->session()->put('logged_in', $admin);

                    if ($admin->Role == "Admin") {
                        // dd($admin->Role);
                        return redirect(route('Dashboard.dashboard'))->with('success', 'Login Berhasil!');
                    } elseif ($admin->Role == "Sekretaris Prodi") {
                        return redirect(route('Dashboard.dashboardsek'))->with('success', 'Login Berhasil!');
                    }
                } else {
                    return redirect(route('logins.index'))->with('error', 'Akun sudah tidak aktif!');
                }
            } else {
                return redirect(route('logins.index'))->with('error', 'Password Salah!');
            }
        }
        return redirect(route('logins.index'))->with('error', 'Username atau Password Salah!');
    }

    public function Logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('logins.index'))->with('successLogout', 'Berhasil Logout');
    }

    public function Logouts()
    {
        Auth::guard('mahasiswa')->logout();
        return redirect(route('logins.logins'))->with('successLogout', 'Berhasil Logout');
    }

    public function Auth(Request $request)
    {

        $info = [
            'RFID' => $request->get('RFID'),
        ];

        $mahasiswa = Mahasiswa::where('RFID', $info['RFID'])->first();
        if ($mahasiswa) {
            if($mahasiswa->Status != 0){
                return view('logins.pin', ['mahasiswa' => $mahasiswa]);
            }else{
                return back()->with('error', 'Mahasiswa Sudah Tidak Bisa Digunakan!');
            }
        } else {
            return back()->with('error', 'Kartu Tidak Terdaftar!');
        }
    }

    public function indexs($nim)
    {
        $mahasiswa = Mahasiswa::where('NIM', $nim);
        return view('logins.Pin', ['mahasiswa' => $mahasiswa]);
    }

    public function PIN(Request $request, $nim)
    {
        $maxAttempts = 3; // Batasan percobaan

        $attempt = $request->session()->get('pin_attempt', 0);

        $request->validate([
            'PIN' => 'required',
        ], [
            'PIN.required' => 'PIN wajib diisi.',
        ]);

        $info = [
            'pin' => $request->get('PIN'),
        ];

        // Eksekusi query dan dapatkan objek Mahasiswa
        $mahasiswa = Mahasiswa::where('NIM', $nim)->first();

        // Periksa apakah objek Mahasiswa ditemukan
        if ($mahasiswa) {
            // Periksa apakah PIN yang dimasukkan benar
            if (Hash::check($info['pin'], $mahasiswa->PIN)) {
                Auth::guard('mahasiswa')->login($mahasiswa);
                $request->session()->put('logged_mhs', $mahasiswa);
                // Reset jumlah percobaan setelah berhasil login
                $request->session()->forget('pin_attempt');
                return redirect(route('Dashboard.dashboardtrl'))->with('success', 'Login Berhasil!');
            } else {
                $attempt++;
                $request->session()->put('pin_attempt', $attempt);

                if ($attempt >= $maxAttempts) {
                    // Clear session dan arahkan ke halaman auth jika percobaan melebihi batas
                    $request->session()->forget('pin_attempt');
                    return redirect(route('logins.logins'))->with('error3x', 'Percobaan masuk melebihi batas');
                } else {
                    return redirect()->back()->with('error', 'PIN Salah!');
                }
            }
        } else {
            return redirect(route('logins.auth'))->with('error', 'Mahasiswa dengan NIM ' . $nim . ' tidak ditemukan');
        }
    }



}