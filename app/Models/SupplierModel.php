<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'supplier';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'kode_supplier', 'nama_supplier', 'alamat', 'telpon_supplier', 'nama_sales', 'telpon_sales'
    ];

    public function getSupplier($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getSupplierTable()
    {
        return $this->db->table('supplier')->select('*')->get()->getResult();
    }
}
