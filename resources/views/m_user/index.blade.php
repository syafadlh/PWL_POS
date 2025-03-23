@extends('adminlte::page')

@section('title', 'Manajemen User')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-users"></i> Manajemen User</h1>
@stop

@section('content')
<div class="card shadow">
    <div class="card-header bg-gradient-primary text-white">
        <h3 class="card-title"><i class="fas fa-list"></i> Daftar User</h3>
        <div class="card-tools">
            <a href="{{ route('m_user.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-user-plus"></i> Tambah User
            </a>
        </div>
    </div>
    
    <div class="card-body">
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session("success") }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        <table id="userTable" class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">User ID</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Password</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($useri as $m_user)
                    <tr>
                        <td class="text-center">{{ $m_user->user_id }}</td>
                        <td class="text-center">
                            <span class="badge badge-info">{{ $m_user->level_id }}</span>
                        </td>
                        <td>{{ $m_user->username }}</td>
                        <td>{{ $m_user->nama }}</td>
                        <td><span class="text-muted">••••••••</span></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('m_user.show', $m_user->user_id) }}" 
                                   class="btn btn-info" data-toggle="tooltip" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('m_user.edit', $m_user->user_id) }}" 
                                   class="btn btn-warning" data-toggle="tooltip" title="Edit User">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-delete" data-id="{{ $m_user->user_id }}" data-toggle="tooltip" title="Hapus User">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $m_user->user_id }}" action="{{ route('m_user.destroy', $m_user->user_id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .btn-group .btn {
            width: 36px; 
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            transition: 0.3s;
        }
        .btn-group .btn:hover {
            transform: scale(1.1);
        }
        .btn-delete:hover {
            background-color: #dc3545 !important;
            color: white !important;
        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(difilter dari total _MAX_ data)",
                    "search": "Cari:"
                }
            });

            $('[data-toggle="tooltip"]').tooltip(); // Aktifkan tooltip

            // Konfirmasi Hapus User
            $('.btn-delete').click(function(e) {
                e.preventDefault();
                let userId = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + userId).submit();
                    }
                });
            });
        });
    </script>
@stop
