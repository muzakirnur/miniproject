<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->first();
        $enrollments = Enrollment::latest()->where('mahasiswa_id', $mahasiswa->id)->paginate(10);
        return view('layouts.mahasiswa.enrollment.index', compact('enrollments'));
    }

    public function create($id)
    {
        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->first();
        Enrollment::create([
            'matakuliah_id' => $id,
            'mahasiswa_id' => $mahasiswa->id,
        ]);
        return redirect()->back()->with('success', 'Matakuliah Berhasil di Enroll');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('mahasiswa.enrollment.index')->with('success', 'Enroll Matakuliah Berhasil Dibatalkan');
    }
}
