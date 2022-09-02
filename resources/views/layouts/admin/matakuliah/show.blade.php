@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('admin.matakuliah.update', $matakuliah->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card mb-3">
                <div class="card-header">
                    Detail Matakuliah
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Kode Matakuliah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('kode_mk') is-invalid @enderror" name="kode_mk"
                                value="{{ $matakuliah->kode_mk }}">
                            @error('kode_mk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">Matakuliah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ $matakuliah->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tempatLahir" class="col-sm-2 col-form-label">Jumlah SKS</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('sks') is-invalid @enderror" name="sks"
                                value="{{ $matakuliah->sks }}">
                            @error('sks')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenisKelamin" class="col-sm-2 col-form-label">Dosen Pengampu</label>
                        <div class="col-sm-10">
                            <select name="dosen_id" class="form-select @error('dosen_id') is-invalid @enderror">
                                <option selected value="{{ $matakuliah->dosen_id }}">
                                    {{ $matakuliah->dosen->name }}
                                </option>
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}">
                                        {{ $dosen->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dosen_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <button class="btn btn-light shadow-sm" type="button" onclick="history.back(-1)"><i
                        class="fas fa-fw fa-arrow-left"></i>
                    Kembali</button>
                <button class="btn btn-primary shadow-sm" type="submit"><i class="fas fa-fw fa-check"></i>
                    Simpan</button>
            </div>
        </form>
    </div>
@endsection
