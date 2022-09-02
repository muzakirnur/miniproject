@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Matakuliah yang di Enroll
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
                            @foreach ($enrollments as $enrollment)
                                <tr>
                                    <th scope="row">
                                        {{ ($enrollments->currentPage() - 1) * $enrollments->perPage() + $loop->iteration }}
                                    </th>
                                    <td>{{ $enrollment->matakuliah->kode_mk }}</td>
                                    <td>{{ $enrollment->matakuliah->name }}</td>
                                    <td>{{ $enrollment->matakuliah->sks }}</td>
                                    <td>{{ $enrollment->matakuliah->dosen->name }}</td>
                                    <td>
                                        <a href="{{ route('mahasiswa.enrollment.destroy', $enrollment->id) }}"
                                            class="btn btn-sm btn-danger delete-confirm"><i class="fas fa-fw fa-trash"></i>
                                            Batalkan Enroll</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                title: 'Yakin ingin Membatalkan Enroll?',
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
