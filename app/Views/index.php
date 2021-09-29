<?php

echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container">
    <div class="jumbotron">
        <div class="row justify-content-center">
            <div class="col text-center">
                <h1>
                    <?php

                    $user = user()->username;

                    date_default_timezone_set("Asia/Jakarta");

                    $b = time();
                    $hour = date("G", $b);

                    if ($hour >= 0 && $hour <= 11) {
                        if (in_groups('Superuser')) {
                            echo "Selamat Pagi Bos " . $user;
                        } else {
                            echo "Selamat Pagi " . $user;
                        }
                    } elseif ($hour >= 12 && $hour <= 14) {
                        if (in_groups('Superuser')) {
                            echo "Selamat Siang Bos " . $user;
                        } else {
                            echo "Selamat Siang " . $user;
                        }
                    } elseif ($hour >= 15 && $hour <= 17) {
                        if (in_groups('Superuser')) {
                            echo "Selamat Sore Bos " . $user;
                        } else {
                            echo "Selamat Sore " . $user;
                        }
                    } elseif ($hour >= 17 && $hour <= 18) {
                        if (in_groups('Superuser')) {
                            echo "Selamat Petang Bos " . $user;
                        } else {
                            echo "Selamat Petang " . $user;
                        }
                    } elseif ($hour >= 19 && $hour <= 23) {
                        if (in_groups('Superuser')) {
                            echo "Selamat Malam Bos " . $user;
                        } else {
                            echo "Selamat Malam " . $user;
                        }
                    }

                    ?>
                </h1>
                <br>
                <h2>Selamat Datang di Sales Information System</h2>
                <h3>(SIPv-1.0)</h3>
                <p>Version 1.0</p>
                <hr>
                <p>Silahkan Memilih Menu di Sebelah Kiri Untuk Melanjutkan</p>
                <p>Semoga Hari Anda Menyenangkan</p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>