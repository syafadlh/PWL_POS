<form action="{{ url('/kategori/import_ajax') }}" method="POST" id="form-import-kategori" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Download Template</label>
                    <a href="{{ asset('template_kategori.xlsx') }}" class="btn btn-info btn-sm" download>
                        <i class="fa fa-file-excel"></i> Download Template
                    </a>
                </div>
                <div class="form-group">
                    <label>Pilih File</label>
                    <input type="file" name="file_kategori" id="file_kategori" class="form-control" required>
                    <small id="error-file_kategori" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $("#form-import-kategori").validate({
        rules: {
            file_kategori: {
                required: true,
                extension: "xlsx"
            }
        },
        submitHandler: function(form) {
            var formData = new FormData(form);
            $.ajax({
                url: form.action,
                type: form.method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        $('#myModal').modal('hide');
                        Swal.fire('Berhasil', response.message, 'success');
                        tableKategori.ajax.reload();
                    } else {
                        $('.error-text').text('');
                        $.each(response.msgField, function(prefix, val) {
                            $('#error-' + prefix).text(val[0]);
                        });
                        Swal.fire('Terjadi Kesalahan', response.message, 'error');
                    }
                }
            });
            return false;
        }
    });
});
</script>
