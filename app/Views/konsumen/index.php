<?php

echo $this->extend('layout/template');
echo $this->section('page-content')

?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Konsumen</h1>
            <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#tambah-konsumen">
                <i class="fa fa-plus-circle"></i> Tambah Data
            </button>
            <table class="table table-hover" id="konsumenTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Konsumen</th>
                        <th>Nama Konsumen</th>
                        <th>Alamat</th>
                        <th>No Telpon</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal - Tambah Konsumen -->
<div class="modal fade" id="tambah-konsumen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Konsumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/konsumen'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="kode_konsumen" name="kode_konsumen" placeholder="Kode Konsumen" value="<?= $konverter->koncode(3); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" placeholder="Nama Konsumen" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" pattern="[0-9]+" class="form-control" id="telpon_konsumen" name="telpon_konsumen" placeholder="No Telpon Konsumen" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Tambahkan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal - Edit Konsumen -->
<?php foreach ($konsumen as $konsumen) : ?>
    <div class="modal fade" id="edit-konsumen<?= $konsumen['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Konsumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/konsumen/' . $konsumen['id']) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $konsumen['id']; ?>">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="kode_konsumen1" name="kode_konsumen" placeholder="Kode Konsumen" value="<?= $konsumen['kode_konsumen']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nama_konsumen1" name="nama_konsumen" placeholder="Nama Konsumen" value="<?= $konsumen['nama_konsumen']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <textarea name="alamat" id="alamat1" class="form-control" placeholder="Alamat"><?= $konsumen['alamat']; ?></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" pattern="[0-9]+" class="form-control" id="telpon_konsumen1" name="telpon_konsumen" placeholder="No Telpon Konsumen" value="<?= $konsumen['telpon_konsumen']; ?>" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    table = $('#konsumenTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/konsumen/konsumenTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
        }]
    });
</script>


<?= $this->endSection(); ?>