@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card mb-3">
                        <div class="card-header">
                            Detail Mahasiswa
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $mahasiswa->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" disabled name="email"
                                        value="{{ $mahasiswa->user->email }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('nim') is-invalid @enderror"
                                        name="nim" value="{{ $mahasiswa->nim }}">
                                    @error('nim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" cols="10" rows="3">{{ $mahasiswa->alamat }}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}">
                                    @error('tempat_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                        name="tgl_lahir" value="{{ date('m/d/Y', strtotime($mahasiswa->tgl_lahir)) }}">
                                    @error('tgl_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select name="jenis_kelamin"
                                        class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                        <option selected value="{{ $mahasiswa->jenis_kelamin }}">
                                            {{ $mahasiswa->jenis_kelamin }}
                                        </option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
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
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        Matakuliah yang Diambil
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Matakuliah</th>
                                        <th scope="col">Nama Matakuliah</th>
                                        <th scope="col">Jumlah SKS</th>
                                        <th scope="col">Dosen Pengampu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enrollments as $enrollment)
                                        <tr>
                                            <th scope="row">
                                                {{ ($enrollments->currentPage() - 1) * $enrollments->perPage() + $loop->iteration }}
                                            </th>
                                            <td>{{ $enrollment->matakuliah->kode_mk }}</td>
                                            <td>{{ $enrollment->matakuliah->name }}</td>
                                            <td>{{ $enrollment->matakuliah->sks }}</td>
                                            <td>{{ $enrollment->matakuliah->dosen->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
