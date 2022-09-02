<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->first();
        $enrollment = Enrollment::where('mahasiswa_id', $mahasiswa->id)->get()->pluck('matakuliah_id');
        $matakuliahs = Matakuliah::whereNotIn('id', $enrollment)->latest()->paginate(10);
        return view('layouts.mahasiswa.matakuliah.index', compact('matakuliahs'));
    }
}
