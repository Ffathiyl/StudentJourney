<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Http\Requests\DivisiStoreRequest;
use App\Http\Requests\DivisiUpdateRequest;
use Illuminate\Support\Facades\Session;

class HalamanAwalController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Penilaian Organisasi Mahasiswa';

        $totalOrganisasi = Organisasi::where('status', 1)->count();
        $totalAnggotaBem = Pengurus::where('organisasi_id', 1)->where('status', 2)->count();
        $totalAnggotaMpm = Pengurus::where('organisasi_id', 2)->where('status', 2)->count();

        return view('HalamanAwal.halamanAwal', compact('title', 'totalOrganisasi','totalAnggotaBem','totalAnggotaMpm'));
    }



}