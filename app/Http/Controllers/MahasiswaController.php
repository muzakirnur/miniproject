<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::count();
        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->first();
        $enrollment = Enrollment::where('mahasiswa_id', $mahasiswa->id)->count();
        return view('layouts.mahasiswa.dashboard', compact('enrollment', 'matakuliah'));
    }
}
