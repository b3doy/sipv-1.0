<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualandetailModel extends Model
{
    protected $table = 'penjualan_detail';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'faktur_penjualan_detail', 'barcode_penjualan_detail', 'harga_beli_penjualan_detail', 'harga_jual_penjualan_detail',
        'jumlah_penjualan_detail', 'sub_total_penjualan_detail'
    ];

    public function getPenjualanDetail($faktur_penjualan = false)
    {
        if ($faktur_penjualan == false) {
            return $this->findAll();
        }
        return $this->find('faktur_penjualan_detail', $faktur_penjualan);
    }

    public function ambilDataDetail($faktur_penjualan)
    {
        // return $this->db->table('penjualan_detail')->getWhere(['faktur_penjualan_detail' => $faktur_penjualan])->getResultArray();
        return $this->db->table('penjualan_detail')->select('*')->join('inventory', 'inventory.barcode = penjualan_detail.barcode_penjualan_detail')->join('penjualan', 'penjualan.faktur_penjualan = penjualan_detail.faktur_penjualan_detail')->where('faktur_penjualan_detail', $faktur_penjualan)->get()->getResultArray();
    }
}
