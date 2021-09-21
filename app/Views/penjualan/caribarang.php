<!-- Modal Cari Barang-->
<div class="modal fade" id="cari-barang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cari-barangLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cari-barangLabel">Cari Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-size:14px;">
                <input type="hidden" name="keyword_barcode" id="keyword_barcode" value="<?= $keyword; ?>">
                <table class="table table-sm table-hover" style="width:100%;" id="cariBarangTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>PLU</th>
                            <th>Barcode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"> Ok</button>
            </div>
        </div>
    </div>
</div>

<script>
    table = $('#cariBarangTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/penjualan/cariBarangTable'); ?>",
            "type": "POST",
            "data": {
                keyword_barcode: $('#keyword_barcode').val()
            },
        },
        "columnDefs": [{
            "targets": [7],
            "orderable": false
        }]
    });

    function pilihItem(barcode, namaBarang) {
        $('#barcode').val(barcode)
        $('#nama_barang').val(namaBarang)
        $('#cari-barang').on('hidden.bs.modal', function(e) {
            $('#barcode').focus()
            cekBarcode()
        })
        $('#cari-barang').modal('hide')
    }
</script>