<!-- Modal Cari Barang-->
<div class="modal fade" id="pembayaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pembayaranLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-2" id="pembayaranLabel">Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-size:14px;">
                <form action="<?= base_url('penjualan/simpanPembayaran'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="faktur_penjualan" value="<?= $fakturPenjualan; ?>">
                    <input type="hidden" name="kode_konsumen" value="<?= $kodeKonsumenPenjualan; ?>">
                    <input type="hidden" name="tanggal_penjualan" value="<?= date('Y-m-d', strtotime($tanggalPenjualan)); ?>">
                    <input type="hidden" name="total_kotor_penjualan" id="total_kotor_penjualan" value="<?= $totalBayar; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold fs-6">Diskon (%)</label>
                                <input type="number" step="0.01" name="diskon_persen_penjualan" id="diskon_persen_penjualan" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold fs-6">Diskon (Rp)</label>
                                <input type="text" name="diskon_nominal_penjualan" id="diskon_nominal_penjualan" class="form-control angka4" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold fs-5">Total Pembayaran</label>
                        <input type="text" name="total_bersih_penjualan" id="total_bersih_penjualan" class="form-control form-control-lg fw-bold text-right fs-1" style="color: blue;" value="<?= $konverter->rupiah($totalBayar); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold fs-5">Jumlah Uang</label>
                        <input type="text" name="jumlah_uang" id="jumlah_uang" class="form-control fw-bold text-right fs-3 angka1" style="color: green;" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold fs-5">Sisa Uang</label>
                        <input type="text" name="sisa_uang" id="sisa_uang" class="form-control fw-bold text-right fs-2" style="color: red;" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal"> Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/public/assets/js/my.js"></script>

<script>
    $(document).ready(function() {
        $('#diskon_persen_penjualan').keyup(function(e) {
            hitungDiskon()
        })
        $('#diskon_nominal_penjualan').keyup(function(e) {
            hitungDiskon()
        })
        $('#jumlah_uang').keyup(function(e) {
            hitungSisaUang()
        })
    });

    function hitungDiskon() {
        let rp = 'Rp. '
        let totalKotorPenjualan = $('#total_kotor_penjualan').val()
        let diskonPersenPenjualan = ($('#diskon_persen_penjualan').val() == '') ? 0 : $('#diskon_persen_penjualan').val()
        let diskonNominalPenjualan = ($('#diskon_nominal_penjualan').val() == '') ? 0 : $('#diskon_nominal_penjualan').val().split('.').join('')
        let hasil = parseFloat(totalKotorPenjualan) - (parseFloat(totalKotorPenjualan) * parseFloat(diskonPersenPenjualan) / 100) - parseFloat(diskonNominalPenjualan)
        $('#total_bersih_penjualan').val(rp + desimal(hasil))
    }

    function hitungSisaUang() {
        let rp = 'Rp. '
        let totalPembayaran = $('#total_bersih_penjualan').val().split('Rp. ').join('').split('.').join('')

        let jumlahUang = ($('#jumlah_uang').val() == '') ? 0 : $('#jumlah_uang').val().split('Rp. ').join('').split('.').join('')

        let sisaUang = parseFloat(jumlahUang) - parseFloat(totalPembayaran)
        $('#sisa_uang').val(rp + desimal(sisaUang))
    }
</script>