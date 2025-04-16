<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-white">Detail Barang</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            @empty($barang)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm">
                        <tr>
                            <th style="width: 30%;">ID</th>
                            <td>{{ $barang->barang_id }}</td>
                        </tr>
                        <tr>
                            <th>Kategori Barang</th>
                            <td>{{ $barang->kategori->kategori_nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kode Barang</th>
                            <td>{{ $barang->barang_kode }}</td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td>{{ $barang->barang_nama }}</td>
                        </tr>
                        <tr>
                            <th>Harga Beli</th>
                            <td>{{ number_format($barang->harga_beli, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Harga Jual</th>
                            <td>{{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
            @endempty
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>

@push('css')
<style>
    .modal-header {
        border-bottom: 1px solid #dee2e6;
    }

    .modal-footer {
        border-top: 1px solid #dee2e6;
    }
</style>
@endpush