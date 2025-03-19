@extends('adminlte::page')

@section('title', 'Tambah Level')

@section('content_header')
    <h1>Tambah Level</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Level</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('level.tambah_simpan') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Kode Level</label>
                <input class="form-control" type="text" name="level_kode" placeholder="Kode Level" required>
            </div>
            <div class="form-group">
                <label>Nama Level</label>
                <input class="form-control" type="text" name="level_nama" placeholder="Nama Level" required>
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
    <script>console.log("Halaman Tambah Level")</script>
@stop
