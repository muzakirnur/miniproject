<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->paginate(10);
        return view('layouts.admin.mahasiswa.index', compact('mahasiswas'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'nim' => 'required|digits:9|unique:mahasiswas',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        Mahasiswa::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'nim' => $validated['nim'],
            'alamat' => $validated['alamat'],
            'tgl_lahir' => $validated['tgl_lahir'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin']
        ]);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        $enrollments = Enrollment::with('matakuliah')->where('mahasiswa_id', $mahasiswa->id)->paginate(10);
        return view('layouts.admin.mahasiswa.show', compact('mahasiswa', 'enrollments'));
    }

    public function update(Mahasiswa $mahasiswa, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'nim' => 'required|digits:9|unique:mahasiswas,nim,' . $mahasiswa->id,
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $mahasiswa->update($validated);
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        User::findOrFail($mahasiswa->user_id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
