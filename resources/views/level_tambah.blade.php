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
        {{-- Tampilkan error umum di atas form --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('level.tambah_simpan') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Kode Level</label>
                <input class="form-control @error('level_kode') is-invalid @enderror" 
                       type="text" 
                       name="level_kode" 
                       placeholder="Kode Level" 
                       value="{{ old('level_kode') }}" 
                       required>
                @error('level_kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama Level</label>
                <input class="form-control @error('level_nama') is-invalid @enderror" 
                       type="text" 
                       name="level_nama" 
                       placeholder="Nama Level" 
                       value="{{ old('level_nama') }}" 
                       required>
                @error('level_nama')
                    <div class="invalid-feedback">{{ $message }}</div>
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
    <script>console.log("Halaman Tambah Level")</script>
@stop
