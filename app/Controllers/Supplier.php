<?php

namespace App\Controllers;

use App\Libraries\Konverter;
use App\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $konverter, $supplierModel;

    function __construct()
    {
        $this->konverter = new Konverter;
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Supplier',
            'konverter' => $this->konverter,
            'supplier'  => $this->supplierModel->getSupplier(),
        ];
        return view('supplier/index', $data);
    }

    public function supplierTable()
    {
        $list = $this->supplierModel->getSupplierTable();
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            if ($list->deleted_at == null) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->kode_supplier;
                $row[] = $list->nama_supplier;
                $row[] = $list->nama_sales;
                $row[] = '<a href="' . base_url('supplier/detail/' . $list->id) . '"class="btn btn-sm btn-info"><i class="fas fa-book"></i> Detail</a>';

                $data[] = $row;
            }
        }
        $output = ['data' => $data];
        echo json_encode($output);
    }

    public function save()
    {
        $sql = $this->supplierModel->save([
            'kode_supplier' => $this->request->getVar('kode_supplier'),
            'nama_supplier' => $this->request->getVar('nama_supplier'),
            'alamat' => $this->request->getVar('alamat'),
            'telpon_supplier' => $this->request->getVar('telpon_supplier'),
            'nama_sales' => $this->request->getVar('nama_sales'),
            'telpon_sales' => $this->request->getVar('telpon_sales'),
        ]);
        if ($sql) {
?>
            <script>
                alert('Data Supplier Berhasil Ditambahkan!')
                window.location.href = "<?= base_url('supplier/index'); ?>"
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Menambahkan Data Supplier!!!')
                window.location.href = "<?= base_url('supplier/index'); ?>"
            </script>
        <?php
        }
    }

    public function detail($id)
    {
        $data = [
            'title'     => 'Info Supplier',
            'supplier'  => $this->supplierModel->getSupplier($id),
            'konverter' => $this->konverter,
        ];
        return view('supplier/detail', $data);
    }

    public function update($id)
    {
        $supplier = $this->supplierModel->getSupplier($id);
        $sql = $this->supplierModel->save([
            'id'                => $id,
            'kode_supplier'     => $this->request->getVar('kode_supplier'),
            'nama_supplier'     => $this->request->getVar('nama_supplier'),
            'alamat'            => $this->request->getVar('alamat'),
            'telpon_supplier'   => $this->request->getVar('telpon_supplier'),
            'nama_sales'        => $this->request->getVar('nama_sales'),
            'telpon_sales'      => $this->request->getVar('telpon_sales'),
        ]);
        if ($sql) {
        ?>
            <script>
                alert('Data Supplier Berhasil Diupdate!')
                window.location.href = '<?= base_url('/supplier/detail/' . $supplier['id']); ?>'
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Mengupdate Data Supplier!')
                window.location.href = '<?= base_url('/supplier/detail/' . $supplier['id']); ?>'
            </script>
        <?php
        }
    }

    public function delete($id)
    {
        $sql = $this->supplierModel->delete($id);
        if ($sql) {
        ?>
            <script>
                alert('Data Supplier Berhasil Dihapus!')
                window.location.href = "<?= base_url('supplier/index'); ?>"
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Menghapus Data Supplier!')
                window.location.href = "<?= base_url('supplier/index'); ?>"
            </script>
<?php
        }
    }
}
