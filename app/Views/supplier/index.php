<?php

echo $this->extend('layout/template');
echo $this->section('page-content')

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Supplier</h1>
            <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#tambah-supplier">
                <i class="fa fa-plus-circle"></i> Tambah Data
            </button>
            <table class="table table-hover" id="supplierTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Nama Sales</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal - Tambah Supplier -->
<div class="modal fade" id="tambah-supplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/supplier'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" placeholder="Kode Supplier" value="<?= $konverter->randcode(3); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" pattern="[0-9]+" class="form-control" id="telpon_supplier" name="telpon_supplier" placeholder="No Telpon Supplier" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="nama_sales" name="nama_sales" placeholder="Nama Sales" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" pattern="[0-9]+" class="form-control" id="telpon_sales" name="telpon_sales" placeholder="No Telpon Sales" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Tambahkan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
<script src="<?= base_url(); ?>/public/assets/datatables/datatables.min.js"></script>
<script>
    table = $('#supplierTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/supplier/supplierTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
        }]
    });
</script>


<?= $this->endSection(); ?>