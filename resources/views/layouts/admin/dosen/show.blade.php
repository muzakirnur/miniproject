@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('admin.dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card mb-3">
                <div class="card-header">
                    Detail Dosen
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="staticName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staticName" name="name"
                                value="{{ $dosen->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticNip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staticNip" name="nip"
                                value="{{ $dosen->nip }}">
                            @error('nip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticAlamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="staticAlamat" name="alamat">{{ $dosen->alamat }}</textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="JenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="JenisKelamin" name="jenis_kelamin">
                                <option value="{{ $dosen->jenis_kelamin }}">{{ $dosen->jenis_kelamin }}</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="createdAt" class="col-sm-2 col-form-label">Tanggal dibuat</label>
                        <div class="col-sm-10">
                            <input type="text" disabled class="form-control" id="createdAt"
                                value="{{ date('d M Y', strtotime($dosen->created_at)) }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-light shadow-sm" type="button" onclick="history.back(-1)"><i
                        class="fas fa-fw fa-arrow-left"></i>
                    Kembali</button>
                <button class="btn btn-primary shadow-sm" type="submit"><i class="fas fa-fw fa-check"></i>
                    Simpan</button>
            </div>
        </form>
    </div>
@endsection
