<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $table = 'satuan';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nama_satuan'
    ];

    public function getSatuan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getSatuanTable()
    {
        return $this->db->table('satuan')->select('*')->get()->getResult();
    }
}
