<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all()->count();
        $mahasiswa = Mahasiswa::all()->count();
        $matakuliah = Matakuliah::all()->count();
        return view('layouts.admin.dashboard', compact('dosen', 'mahasiswa', 'matakuliah'));
    }
}
