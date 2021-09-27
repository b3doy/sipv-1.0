<?php

echo $this->extend('layout/template');
echo $this->section('page-content');


?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>User List</h1>
            <a href="<?= base_url('register') ?>" class="btn btn-primary">Tambah User</a>
        </div>
        <table class="table table-hover mt-3">
            <thead>
                <th>#</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No Handphone</th>
                <th>Alamat</th>
                <th>Role</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $user->fullname; ?></td>
                        <td><?= $user->username; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= $user->telpon; ?></td>
                        <td><?= $user->alamat; ?></td>
                        <td><a href="<?= base_url('/user/' . $user->userid); ?>"><?= $user->name; ?></a></td>
                        <td>
                            <form action="<?= base_url('/user/' . $user->userid); ?>" method="POST" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-circle btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus User" onclick="return confirm('Anda Yakin Akan Menghapus User Ini?')"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>