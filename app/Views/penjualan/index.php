<?php

echo $this->extend('layout/template');
echo $this->section('page-content');

?>


<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Menu Penjualan</h1>
            <div class="row">
                <!-- Menu Inputan Kasir Card  -->
                <?php if (in_groups('Superuser') || in_groups('Administrator') || in_groups('Kasir')) : ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a class="btn btn-primary w-100" href="<?= base_url('penjualan/input'); ?>">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                                Input</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Kasir</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-keyboard fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <!-- Menu Data Penjualan Card  -->
                <?php if (in_groups('Superuser') || in_groups('Administrator')) : ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a class="btn btn-success w-100" href="<?= base_url('penjualan/dataPenjualan'); ?>">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xl font-weight-bold text-success text-uppercase mb-1">
                                                Data</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Penjualan</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>