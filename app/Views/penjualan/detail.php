<table class="table table-sm table-hover">
    <thead class="text-center">
        <tr>
            <th>#</th>
            <th>Barcode</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub Total</th>
            <th>---</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data_penjualan as $penjualan) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $penjualan['kode_barcode']; ?></td>
                <td><?= $penjualan['nama_barang']; ?></td>
                <td class="text-center"><?= $penjualan['jml']; ?></td>
                <td class="text-right"><?= $konverter->rupiah($penjualan['harga']); ?></td>
                <td class="text-right"><?= $konverter->rupiah($penjualan['sub_total']); ?></td>
                <td class="text-center">
                    <form action="<?= base_url('penjualan/delete/' . $penjualan['temp_id']); ?>" method="POST" class="d-inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <?= csrf_field(); ?>
                        <!-- <button type="button" class="btn btn-sm btn-circle btn-danger" onclick="hapusItem('<?= $penjualan['temp_id']; ?>','<?= $penjualan['nama_barang']; ?>')" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"> -->
                        <button type="submit" class="btn btn-sm btn-circle btn-danger" onclick="confirm('Anda Yakin Akan Menghapus Data ini?!')" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    function hapusItem(id, nama) {
        confirm('Anda Yakin Akan Menghapus Data ' + nama + ' ini?!')
    }
</script>