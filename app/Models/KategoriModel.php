<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nama_kategori'
    ];

    public function getKategori($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getKategoriTable()
    {
        return $this->db->table('kategori')->select('*')->get()->getResult();
    }

    public function getKategoriPlu($id)
    {
        return $this->db->table('kategori')->join('inventory', 'inventory.kategori_id = kategori.id')->where('kategori.id', $id)->get()->getRowArray();
    }
}
