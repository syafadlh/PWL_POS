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
            <div class="form-group">
                <label>Username</label>
                <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                @error('username')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
                @error('nama')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
                @error('password')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Level ID</label>
                <select class="form-control @error('level_id') is-invalid @enderror" name="level_id" required>
                    <option value="">-- Pilih Level --</option>
                    <option value="1" {{ old('level_id') == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('level_id') == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('level_id') == 3 ? 'selected' : '' }}>3</option>
                </select>
                @error('level_id')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
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
