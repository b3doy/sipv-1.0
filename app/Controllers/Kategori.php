<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;

    function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Kategori Inventory',
            'kategori'  => $this->kategoriModel->getKategori()
        ];
        return view('kategori/index', $data);
    }

    public function kategoriTable()
    {
        $list = $this->kategoriModel->getKategoriTable();
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $list->nama_kategori;
            $row[] = '<button type="button" class="btn btn-circle btn-sm btn-warning" style="color:black" data-bs-toggle="modal" data-bs-target="#edit-kategori' . $list->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fas fa-edit"></i>
            </button> |
            <form action=' . base_url('/kategori/delete/' . $list->id) . 'method="POST" class="d-inline">' . csrf_field() . '
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-sm btn-circle btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data" onclick=\'javascript:return confirm("Anda Yakin Akan Menghapus Data Ini?")\'><i class="fa fa-trash"></i></button>
            </form>';

            $data[] = $row;
        }
        $output = ['data' => $data];
        echo json_encode($output);
    }

    public function save()
    {
        $sql = $this->kategoriModel->insert([
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);
        if ($sql) {
?>
            <script>
                alert('Data Kategori Berhasil Ditambahkan!')
                window.location.href = '<?= base_url('kategori/index'); ?>'
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Menambahkan Data Kategori!')
                window.location.href = '<?= base_url('kategori/index'); ?>'
            </script>
        <?php
        }
    }

    public function update($id)
    {
        $sql = $this->kategoriModel->save([
            'id'            => $id,
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);
        if ($sql) {
        ?>
            <script>
                alert('Data Kategori Berhasil Diupdate!')
                window.location.href = '<?= base_url('kategori/index'); ?>'
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Mengubah Data Kategori!')
                window.location.href = '<?= base_url('kategori/index'); ?>'
            </script>
        <?php
        }
    }

    public function delete($id)
    {
        $sql = $this->kategoriModel->delete($id);
        if ($sql) {
        ?>
            <script>
                alert('Data Kategori Berhasil Dihapus!')
                window.location.href = '<?= base_url('kategori/index'); ?>'
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Kategori Tidak Bisa Dihapus Dikarenakan Digunakan Oleh Data Inventory!')
                window.location.href = '<?= base_url('kategori/index'); ?>'
            </script>
<?php
        }
    }
}
