<?php

namespace App\Controllers;

use App\Models\SatuanModel;

class Satuan extends BaseController
{
    protected $satuanModel;

    function __construct()
    {
        $this->satuanModel = new SatuanModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Satuan Inventory',
            'satuan'    => $this->satuanModel->getSatuan()
        ];
        return view('satuan/index', $data);
    }

    public function satuanTable()
    {
        $list = $this->satuanModel->getSatuanTable();
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $list->nama_satuan;
            $row[] = '<button type="button" class="btn btn-circle btn-sm btn-warning" style="color:black" data-bs-toggle="modal" data-bs-target="#edit-satuan' . $list->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fas fa-edit"></i>
            </button> |
            <form action=' . base_url('/satuan/delete/' . $list->id) . 'method="POST" class="d-inline">' . csrf_field() . '
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
        $sql = $this->satuanModel->insert([
            'nama_satuan' => $this->request->getVar('nama_satuan')
        ]);
        if ($sql) {
?>
            <script>
                alert('Data Satuan Berhasil Ditambahkan!')
                window.location.href = '<?= base_url('satuan/index'); ?>'
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Menambahkan Data Satuan!')
                window.location.href = '<?= base_url('satuan/index'); ?>'
            </script>
        <?php
        }
    }

    public function update($id)
    {
        $sql = $this->satuanModel->save([
            'id'            => $id,
            'nama_satuan'   => $this->request->getVar('nama_satuan')
        ]);
        if ($sql) {
        ?>
            <script>
                alert('Data Satuan Berhasil Diupdate!')
                window.location.href = '<?= base_url('satuan/index'); ?>'
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Mengubah Data Satuan!')
                window.location.href = '<?= base_url('satuan/index'); ?>'
            </script>
        <?php
        }
    }

    public function delete($id)
    {
        $sql = $this->satuanModel->delete($id);
        if ($sql) {
        ?>
            <script>
                alert('Data Satuan Berhasil Dihapus!')
                window.location.href = '<?= base_url('satuan/index'); ?>'
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Data Satuan Tidak Bisa Dihapus Dikarenakan Digunakan Oleh Data Inventory!')
                window.location.href = '<?= base_url('satuan/index'); ?>'
            </script>
<?php
        }
    }
}
