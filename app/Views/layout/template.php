<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/bootstrap-utilities.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/vendor/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/vendor/fontawesome-free/css/fontawesome.min.css">

    <script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
    <script src="<?= base_url(); ?>/public/assets/datatables/datatables.min.js"></script>

    <title><?= $title; ?></title>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('layout/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('layout/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Content -->
                    <?= $this->renderSection('page-content'); ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('layout/footer'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?= base_url(); ?>/public/assets/js/jquery.maskMoney.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/jquery.mask.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/vendor/jquery-easing/jquery.easing.compatibility.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/my.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/sum.js"></script>
    <script src="<?= base_url(); ?>/public/assets/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/vendor/fontawesome-free/js/all.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/vendor/fontawesome-free/js/fontawesome.min.js"></script>


</body>

</html>