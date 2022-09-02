<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        $matakuliahs = Matakuliah::latest()->paginate(10);
        return view('layouts.admin.matakuliah.index', compact('matakuliahs', 'dosens'));
    }

    public function show(Matakuliah $matakuliah)
    {
        $dosens = Dosen::all();
        return view('layouts.admin.matakuliah.show', compact('matakuliah', 'dosens'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'kode_mk' => 'required|digits:5|unique:matakuliahs',
            'name' => 'required',
            'sks' => 'required|numeric',
            'dosen_id' => 'required'
        ]);

        Matakuliah::create($validated);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Matakuliah $matakuliah, Request $request)
    {
        $validated = $request->validate([
            'kode_mk' => 'required|digits:5|unique:matakuliahs,kode_mk,' . $matakuliah->id,
            'name' => 'required',
            'sks' => 'required|numeric',
            'dosen_id' => 'required'
        ]);

        $matakuliah->update($validated);
        return redirect()->route('admin.matakuliah.index')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
