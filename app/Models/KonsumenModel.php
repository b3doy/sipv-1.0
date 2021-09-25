<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsumenModel extends Model
{
    protected $table = 'konsumen';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'kode_konsumen', 'nama_konsumen', 'alamat', 'telpon_konsumen'
    ];

    public function getKonsumen($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find('id', $id);
    }

    public function getKonsumenTable()
    {
        return $this->db->table('konsumen')->select('*')->get()->getResult();
    }
}
