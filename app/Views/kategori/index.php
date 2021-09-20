<?php

echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Kategori Barang</h1>
            <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#tambah-kategori">
                <i class="fa fa-plus-circle"></i> Tambah Data
            </button>
            <table class="table table-hover" id="kategoriTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kategori</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal - Tambah Kategori -->
<div class="modal fade" id="tambah-kategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Jenis Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/kategori'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
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
<?php foreach ($kategori as $kategori) : ?>
    <div class="modal fade" id="edit-kategori<?= $kategori['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Jenis Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('/kategori/' . $kategori['id']) ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $kategori['id']; ?>">
                        <div class="mb-3">
                            <label for="">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori1" name="nama_kategori" value="<?= $kategori['nama_kategori']; ?>" required>
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
    table = $('#kategoriTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/kategori/kategoriTable'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
        }]
    });
</script>

<?= $this->endSection(); ?>