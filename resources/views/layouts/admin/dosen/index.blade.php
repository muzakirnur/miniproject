@extends('layouts.app')
@section('content')
    <div class="container">
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahDosen">
            <i class="fas fa-fw fa-plus"></i>
            Tambah Dosen
        </button>
        @include('layouts.partials.alerts')
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosens as $dosen)
                            <tr>
                                <th scope="row">
                                    {{ ($dosens->currentPage() - 1) * $dosens->perPage() + $loop->iteration }}</th>
                                <td>{{ $dosen->name }}</td>
                                <td>{{ $dosen->nip }}</td>
                                <td>{{ $dosen->jenis_kelamin }}</td>
                                <td>{{ $dosen->alamat }}</td>
                                <td>
                                    <a href="{{ route('admin.dosen.show', $dosen->id) }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-fw fa-eye"></i></a>
                                    <a href="{{ route('admin.dosen.destroy', $dosen->id) }}"
                                        class="btn btn-sm btn-danger delete-confirm"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $dosens->links() }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalTambahDosen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.dosen.create') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="nip" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" cols="10" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
                    text: 'Data Dosen ini akan di Hapus Permanen',
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
