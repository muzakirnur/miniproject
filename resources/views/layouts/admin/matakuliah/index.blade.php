@extends('layouts.app')
@section('content')
    <div class="container">
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalMatakuliah">
            <i class="fas fa-fw fa-plus"></i>
            Tambah Matakuliah
        </button>
        @include('layouts.partials.alerts')
        <div class="card">
            <div class="card-header">
                Data Matakuliah
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matakuliahs as $matakuliah)
                                <tr>
                                    <th scope="row">
                                        {{ ($matakuliahs->currentPage() - 1) * $matakuliahs->perPage() + $loop->iteration }}
                                    </th>
                                    <td>{{ $matakuliah->kode_mk }}</td>
                                    <td>{{ $matakuliah->name }}</td>
                                    <td>{{ $matakuliah->sks }}</td>
                                    <td>{{ $matakuliah->dosen->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.matakuliah.show', $matakuliah->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="{{ route('admin.matakuliah.destroy', $matakuliah->id) }}"
                                            class="btn btn-sm btn-danger delete-confirm"><i
                                                class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $matakuliahs->links() }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalMatakuliah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Matakuliah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.matakuliah.create') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Kode Matakuliah</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('kode_mk') is-invalid @enderror"
                                    name="kode_mk" value="{{ old('kode_mk') }}">
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
                            <label for="tempatLahir" class="col-sm-2 col-form-label">Jumlah SKS</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('sks') is-invalid @enderror" name="sks"
                                    value="{{ old('sks') }}">
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
                                    <option selected>Pilih Dosen Pengampu</option>
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
                    text: 'Data Matakuliah ini akan di Hapus Permanen',
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
