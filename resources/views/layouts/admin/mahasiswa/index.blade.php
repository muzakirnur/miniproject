@extends('layouts.app')
@section('content')
    <div class="container">
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalMahasiswa">
            <i class="fas fa-fw fa-plus"></i>
            Tambah Mahasiswa
        </button>
        @include('layouts.partials.alerts')
        <div class="card">
            <div class="card-header">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                                <tr>
                                    <th scope="row">
                                        {{ ($mahasiswas->currentPage() - 1) * $mahasiswas->perPage() + $loop->iteration }}
                                    </th>
                                    <td>{{ $mahasiswa->name }}</td>
                                    <td>{{ $mahasiswa->user->email }}</td>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    <td>{{ $mahasiswa->jenis_kelamin }}</td>
                                    <td>{{ $mahasiswa->alamat }}</td>
                                    <td>
                                        <a href="{{ route('admin.mahasiswa.show', $mahasiswa->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="{{ route('admin.mahasiswa.destroy', $mahasiswa->id) }}"
                                            class="btn btn-sm btn-danger delete-confirm"><i
                                                class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $mahasiswas->links() }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.mahasiswa.create') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}">
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
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nim') is-invalid @enderror" name="nim"
                                    value="{{ old('nim') }}">
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
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" cols="10" rows="3">{{ old('alamat') }}</textarea>
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
                                    name="tempat_lahir" value="{{ old('tempat_lahir') }}">
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
                                    name="tgl_lahir" value="{{ old('tgl_lahir') }}">
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
                                    <option selected>Pilih Jenis Kelamin</option>
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
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" value="{{ old('password') }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" value="{{ old('password_confirmation') }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @push('js')
        <script>
            $('.delete-confirm').on('click', function(event) {
                event.preventDefault();
                const url = $(this).attr('href');
                swal({
                    title: 'Yakin ingin Menghapus ?',
                    text: 'Data Mahasiswa ini akan di Hapus Permanen',
                    icon: 'warning',
                    buttons: ["Cancel", "Yes!"],
                }).then(function(value) {
                    if (value) {
                        window.location.href = url;
                    }
                });
            });
        </script>
    @endpush
