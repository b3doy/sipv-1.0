<?php

echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    <h1>Informasi Supplier</h1>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('supplier'); ?>" class="btn btn-sm btn-secondary mt-3" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali Ke Menu Sebelumnya"><i class="fa fa-undo"></i></a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <u><?= $supplier['nama_supplier']; ?></u>
                    </h4>
                    <table class="table-sm table-borderless">
                        <tr>
                            <td>No Telpon</td>
                            <td>:</td>
                            <td><?= $supplier['telpon_supplier']; ?></td>
                        </tr>
                        <tr>
                            <td>Kode Supplier</td>
                            <td>:</td>
                            <td><?= $supplier['kode_supplier']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $supplier['alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Sales</td>
                            <td>:</td>
                            <td><?= $supplier['nama_sales']; ?></td>
                        </tr>
                        <tr>
                            <td>No Telpon Sales</td>
                            <td>:</td>
                            <td><?= $supplier['telpon_sales']; ?></td>
                        </tr>
                    </table>
                    <h4 class="mt-3"><?= $supplier['kode_supplier']; ?></h4>
                    <hr>
                    <button type="button" class="btn btn-warning edit-modal-btn" style="color:black"><i class="fas fa-edit"></i> Edit</button>
                    <form action=<?= base_url('/supplier/' . $supplier['id']); ?> method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger mx-3" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')"><i class="fa fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal - Edit Supplier -->
<div class="modal fade" id="edit-supplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/supplier/' . $supplier['id']); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id" value="<?= $supplier['id']; ?>">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" placeholder="Kode Supplier" value="<?= $supplier['kode_supplier']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier" value="<?= $supplier['nama_supplier']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"><?= $supplier['alamat']; ?></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" pattern="[0-9]+" class="form-control" id="telpon_supplier" name="telpon_supplier" placeholder="No Telpon Supplier" value="<?= $supplier['telpon_supplier']; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="nama_sales" name="nama_sales" placeholder="Nama Sales" value="<?= $supplier['nama_sales']; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" pattern="[0-9]+" class="form-control" id="telpon_sales" name="telpon_sales" placeholder="No Telpon Sales" value="<?= $supplier['telpon_sales']; ?>" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
<script src="<?= base_url(); ?>/public/assets/datatables/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('.edit-modal-btn').on('click', function() {
            $('#edit-supplier').modal('show')
        })
    })
</script>


<?= $this->endSection(); ?>