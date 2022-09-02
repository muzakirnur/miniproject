<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::latest()->paginate(10);
        return view('layouts.admin.dosen.index', compact('dosens'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'nip' => 'digits:9|unique:dosens',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        Dosen::create([
            'name' => $validated['name'],
            'nip' => $validated['nip'],
            'alamat' => $validated['alamat'],
            'jenis_kelamin' => $validated['jenis_kelamin']
        ]);
        return back()->with('success', 'Data Berhasil ditambahkan');
    }

    public function show(Dosen $dosen)
    {
        return view('layouts.admin.dosen.show', compact('dosen'));
    }

    public function update(Dosen $dosen, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'nip' => 'digits:9|unique:dosens,nip,' . $dosen->id,
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        $dosen->update($validated);
        return redirect()->route('admin.dosen.index')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
