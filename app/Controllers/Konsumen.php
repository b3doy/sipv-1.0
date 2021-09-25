<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\KonsumenModel;

class Konsumen extends BaseController
{
    protected $konverter, $konsumenModel;

    function __construct()
    {
        $this->konverter = new Konverter;
        $this->konsumenModel = new KonsumenModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Konsumen',
            'konverter' => $this->konverter,
            'konsumen'  => $this->konsumenModel->getKonsumen()
        ];
        return view('konsumen/index', $data);
    }

    public function konsumenTable()
    {
        $list = $this->konsumenModel->getKonsumenTable();
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            if ($list->deleted_at == null) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->kode_konsumen;
                $row[] = $list->nama_konsumen;
                $row[] = $list->alamat;
                $row[] = $list->telpon_konsumen;
                $row[] = '<button type="button" class="btn btn-circle btn-sm btn-warning" style="color:black" data-bs-toggle="modal" data-bs-target="#edit-konsumen' . $list->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fas fa-edit"></i>
                </button> |
                <form action=' . base_url('/konsumen/delete/' . $list->id) . 'method="POST" class="d-inline">' . csrf_field() . '
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-sm btn-circle btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data" onclick=\'javascript:return confirm("Anda Yakin Akan Menghapus Data Ini?")\'><i class="fa fa-trash"></i></button>
                </form>';


                $data[] = $row;
            }
        }
        $output = ['data' => $data];
        echo json_encode($output);
    }

    public function save()
    {
        $sql = $this->konsumenModel->save([
            'kode_konsumen' => $this->request->getVar('kode_konsumen'),
            'nama_konsumen' => $this->request->getVar('nama_konsumen'),
            'alamat' => $this->request->getVar('alamat'),
            'telpon_konsumen' => $this->request->getVar('telpon_konsumen'),
        ]);
        if ($sql) {
?>
            <script>
                alert('Data Konsumen Berhasil Ditambahkan!')
                window.location.href = "<?= base_url('konsumen/index'); ?>"
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Menambahkan Data Konsumen!')
                window.location.href = "<?= base_url('konsumen/index'); ?>"
            </script>
        <?php
        }
    }

    public function update($id)
    {
        $sql = $this->konsumenModel->update([
            'id'                => $id,
            'kode_konsumen'     => $this->request->getVar('kode_konsumen'),
            'nama_konsumen'     => $this->request->getVar('nama_konsumen'),
            'alamat'            => $this->request->getVar('alamat'),
            'telpon_konsumen'   => $this->request->getVar('telpon_konsumen'),
        ]);
        if ($sql) {
        ?>
            <script>
                alert('Data Konsumen Berhasil Diupdate!')
                window.location.href = "<?= base_url('konsumen/index'); ?>"
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Mengubah Data Konsumen!')
                window.location.href = "<?= base_url('konsumen/index'); ?>"
            </script>
        <?php
        }
    }

    public function delete($id)
    {
        $sql = $this->konsumenModel->delete($id);
        if ($sql) {
        ?>
            <script>
                alert('Data Konsumen Berhasil Dihapus!')
                window.location.href = "<?= base_url('konsumen/index'); ?>"
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Menghapus Data Konsumen!')
                window.location.href = "<?= base_url('konsumen/index'); ?>"
            </script>
<?php
        }
    }
}
