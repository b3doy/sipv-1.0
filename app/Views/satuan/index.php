<?php

echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Satuan Barang</h1>
            <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#tambah-satuan">
                <i class="fa fa-plus-circle"></i> Tambah Data
            </button>
            <table class="table table-hover" id="satuanTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Satuan</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal - Tambah satuan -->
<div class="modal fade" id="tambah-satuan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Satuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/satuan'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="">Nama Satuan</label>
                        <input type="text" class="form-control" id="nama_satuan" name="nama_satuan" required>
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
<?php foreach ($satuan as $satuan) : ?>
    <div class="modal fade" id="edit-satuan<?= $satuan['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Jenis satuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/satuan/' . $satuan['id']) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $satuan['id']; ?>">
                        <div class="mb-3">
                            <label for="">Nama satuan</label>
                            <input type="text" class="form-control" id="nama_satuan1" name="nama_satuan" value="<?= $satuan['nama_satuan']; ?>" required>
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
    table = $('#satuanTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/satuan/satuanTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
        }]
    });
</script>

<?= $this->endSection(); ?>