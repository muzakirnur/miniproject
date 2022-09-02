@extends('layouts.app')
@section('content')
    <div class="container">
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
                                        <a href="{{ route('mahasiswa.enrollment.create', $matakuliah->id) }}"
                                            class="btn btn-sm btn-success enroll-confirm"><i class="fas fa-fw fa-plus"></i>
                                            Enroll</a>
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
@endsection
@push('js')
    <script>
        $('.enroll-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Yakin ingin Enroll Matakuliah Ini ?',
                text: 'Anda Dapat Membatalkan Enroll Pada Menu MyEnrollment',
                icon: 'info',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
@endpush
