@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Profile User</h4>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ $user->profile_photo_url }}" class="img-thumbnail" width="200" height="200">
                <form action="{{ route('profile.upload-photo') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                    @csrf
                    <input type="file" name="profile_photo" class="form-control mb-2">
                    @error('profile_photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <button type="submit" class="btn btn-primary">Upload Foto</button>
                </form>
                @if(session('success'))
                    <div class="alert alert-success mt-2">{{ session('success') }}</div>
                @endif
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr><th>Username</th><td>{{ $user->username }}</td></tr>
                    <tr><th>Nama</th><td>{{ $user->nama }}</td></tr>
                    <tr><th>Level</th><td>{{ $user->level->level_nama ?? '-' }}</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection