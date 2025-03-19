@extends('adminlte::page')

@section('title', 'Tambah User')

@section('content_header')
    <h1>Tambah User</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Tambah User</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('user.tambah.simpan') }}" method="POST">
            @csrf
            {{-- <div class="form-group">
                <label>ID User</label>
                <input class="form-control" type="text" name="user_id" placeholder="User ID" required>
            </div> --}}
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label>Level ID</label>
                <select class="form-control" name="level_id" required>
                    <option value="">-- Pilih Level --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
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
    <script>console.log("Halaman Tambah User")</script>
@stop
