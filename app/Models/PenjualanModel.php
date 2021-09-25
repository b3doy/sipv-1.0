<?php

namespace App\Models;

use CodeIgniter\Model;

date_default_timezone_set('Asia/Jakarta');

class PenjualanModel extends Model
{
    protected $table = 'penjualan';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'faktur_penjualan', 'tanggal_penjualan', 'kode_konsumen_penjualan', 'diskon_persen_penjualan',
        'diskon_nominal_penjualan', 'total_kotor_penjualan', 'total_bersih_penjualan', 'jumlah_uang', 'sisa_uang'
    ];

    public function getPenjualan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getPenjualanFaktur()
    {
        return $this->db->table('penjualan')->selectMax('faktur_penjualan')->where('tanggal_penjualan', date('Y-m-d'))->get()->getRowArray()['faktur_penjualan'];
    }

    public function getJumlahOmsetHarian()
    {
        return $this->db->table('penjualan')->select('*')->selectSum('total_bersih_penjualan', 'total')->groupBy('tanggal_penjualan')->get()->getResultArray();
    }
}
