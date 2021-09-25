<?php

namespace App\Controllers;

use Config\Database;
use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    protected $db, $builder, $users;

    public function __construct()
    {
        $this->db      = Database::connect();
        $this->builder = $this->db->table('users');
        $this->users   = new UserModel();
    }
    public function index()
    {

        $data = [
            'title' => 'SIP || User List',
            'users'  => $this->users->findAll()
        ];

        return view('user/index', $data);
    }

    public function delete($id)
    {
        $sql = $this->builder->delete(['id' => $id]);
        if ($sql) {
?>
            <script>
                alert('Data User Berhasil Dihapus!')
                window.location.href = "<?= base_url('/user'); ?>"
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Gagal Menghapus Data User!')
                window.location.href = "<?= base_url('/user'); ?>"
            </script>
<?php
        }
    }
}
