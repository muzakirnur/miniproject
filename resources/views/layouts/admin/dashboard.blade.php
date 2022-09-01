@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Selamat Datang {{ Auth::user()->name }}
            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
@endsection