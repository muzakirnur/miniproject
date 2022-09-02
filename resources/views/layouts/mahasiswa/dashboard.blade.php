@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Selamat Datang di Dashboard Mahasiswa
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <div class="card">
                            <div class="card-body bg-primary rounded text-white">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3><i class="fas fa-fw fa-book"></i>Matakuliah</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="text-end">{{ $matakuliah }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <div class="card">
                            <div class="card-body bg-success rounded text-white">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3><i class="fas fa-fw fa-book-open-reader"></i>Enrollment</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="text-end">{{ $enrollment }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
