<?php

echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    <h1>Detail Data Barang</h1>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('inventory'); ?>" class="btn btn-secondary btn-circle mt-3" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali Ke Menu Sebelumnya"><i class="fa fa-undo"></i></a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <u><?= $inventory->nama_barang; ?></u>
                    </h4>
                    <table class="table-sm table-borderless">
                        <tr>
                            <td>Plu</td>
                            <td>:</td>
                            <td><?= $inventory->plu; ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td><?= $inventory->nama_kategori; ?></td>
                        </tr>
                        <tr>
                            <td>Harga Beli</td>
                            <td>:</td>
                            <td><?= $konverter->rupiah($inventory->harga_beli); ?></td>
                        </tr>
                        <tr>
                            <td>Margin</td>
                            <td>:</td>
                            <td><?= $inventory->margin; ?> %</td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td>:</td>
                            <td><?= $inventory->stok; ?> <?= $inventory->nama_satuan; ?></td>
                        </tr>
                        <tr>
                            <td>Supplier</td>
                            <td>:</td>
                            <td><?= $inventory->nama_supplier; ?></td>
                        </tr>
                        <tr>
                            <td>Barcode</td>
                            <td>:</td>
                            <td><?= $inventory->barcode; ?></td>
                        </tr>
                    </table>
                    <h4 class="mt-3"><?= $konverter->rupiah($inventory->harga_jual); ?>,-</h4>
                    <hr>
                    <button type="button" class="btn btn-warning edit-modal-btn" style="color:black"><i class="fas fa-edit"></i> Edit</button>
                    <form action=<?= base_url('/inventory/' . $inventory->inventory_id); ?> method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger mx-3" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')"><i class="fa fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal - Edit Inventory -->
<div class="modal fade" id="edit-inventory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Inventory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/inventory/' . $inventory->inventory_id); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id" value="<?= $inventory->inventory_id; ?>">
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">--- Pilih Kategori ---</option>
                            <option value="<?= $inventory->kategori_id; ?>" selected><?= $inventory->nama_kategori; ?></option>
                            <?php foreach ($kategori as $kategori) : ?>
                                <option value="<?= $kategori['id']; ?>" data-kategori="<?= $kategori['nama_kategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>PLU</label>
                        <input type="text" class="form-control" id="plu" name="plu" value="<?= $inventory->plu; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $inventory->nama_barang; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Barcode</label>
                        <input type="text" class="form-control" id="barcode" name="barcode" value="<?= $inventory->barcode; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga Beli</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control angka4" id="harga_beli" name="harga_beli" placeholder="Harga Beli" value="<?= $konverter->angka($inventory->harga_beli); ?>" onkeyup="marginJual()" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Harga Jual</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control angka4" id="harga_jual" name="harga_jual" value="<?= $konverter->angka($inventory->harga_jual); ?>" onkeyup="marginJual()" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Margin</label>
                        <div class="input-group">
                            <input type="number" step="0.1" class="form-control" id="margin" name="margin" value="<?= $inventory->margin; ?>" readonly>
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $inventory->stok; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Satuan Barang</label>
                        <div class="input-group mb-3">
                            <select name="satuan" id="satuan" class="form-control">
                                <option value="">----- Pilih Satuan Barang -----</option>
                                <option value="<?= $inventory->satuan_id; ?>" selected><?= $inventory->nama_satuan; ?></option>
                                <?php foreach ($satuan as $satuan) : ?>
                                    <option value="<?= $satuan['id']; ?>"><?= $satuan['nama_satuan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Nama Supplier</label>
                        <select name="kode_supplier" id="kode_supplier" class="form-control" required>
                            <option value="">----- Pilih Nama Supplier -----</option>
                            <option value="<?= $inventory->inv_kode_supplier; ?>" selected><?= $inventory->nama_supplier; ?></option>
                            <?php foreach ($supplier as $supplier) : ?>
                                <option value="<?= $supplier['kode_supplier']; ?>"><?= $supplier['nama_supplier']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $('#kategori').on('change', function() {
        let kategori = $('#kategori option:selected').data('kategori')
        let plu = kategori[0] + kategori[1] + kategori[2] + '<?= $konverter->plu() ?>'
        $('#plu').val(plu)
    })

    function marginJual() {
        let hargaBeli = document.getElementById('harga_beli').value
        hargaBeli01 = hargaBeli.split('.').join('')

        let hargaJual = document.getElementById('harga_jual').value
        hargaJual01 = hargaJual.split('.').join('')

        let margin = 100 - (parseFloat((hargaBeli01) / (parseInt(hargaJual01)) * 100))
        document.getElementById('margin').value = margin.toFixed(2)
    }

    $(document).ready(function() {
        $('.edit-modal-btn').on('click', function() {
            $('#edit-inventory').modal('show')
        })
    })
</script>


<?= $this->endSection(); ?>