<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::paginate(10);
        return view('layouts.admin.dosen.index', compact('dosens'));
    }

    public function create(Request $request)
    {
        Dosen::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
        return back()->with('success', 'Data Berhasil ditambahkan');
    }
}
