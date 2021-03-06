<?php

echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1><u>Data Penjualan</u></h1>
        </div>
        <!-- Grafik Omset vs Tanggal -->
        <div class="card shadow my-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Data Omset</h5>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class="">

                            </div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="grafik_omset" style="display: block; height: 320px; width: 384px;" width="360" height="300" class="chartjs-render-monitor"></canvas>
                </div>
                <hr>
            </div>
        </div>
        <!-- Grafik Penjualan Barang -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-success">Data Penjualan Barang</h5>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="grafik_barang" width="360" height="300" style="display: block; height: 320px; width: 384px;" class="chartjs-render-monitor"></canvas>
                </div>
                <hr>
            </div>
        </div>
        <!-- Grafik Stok Barang yang Terjual -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold" style="color:#8c0ca0;">Jumlah Barang Yang Terjual</h5>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="grafik_jumlah" width="240" height="236" style="display: block; height: 252px; width: 256px;" class="chartjs-render-monitor"></canvas>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/public/assets/vendor/chart.js/Chart.bundle.min.js"></script>
<script>
    // Set default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Area Grafik Omset
    var ctx = document.getElementById("grafik_omset");
    var chartOmset = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php
                foreach ($penjualanHarian as $tglPenjualan) {
                    $tgl =  date('d-M', strtotime($tglPenjualan['tanggal_penjualan']));
                    echo "'$tgl'" . ', ';
                }
                ?>
            ],
            datasets: [{
                label: "Omset",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php
                    foreach ($penjualanHarian as $hargaPenjualan) {
                        echo ($hargaPenjualan['total']) . ', ';
                    }
                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7000
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 10,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return 'Rp ' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rp ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });


    // Bar Grafik Barang
    var ctx = document.getElementById("grafik_barang");
    var chartBarang = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                foreach ($penjualanBarang as $namaBarang) {
                    echo "'$namaBarang[nama_barang]'" . ', ';
                }
                ?>
            ],
            datasets: [{
                label: "Penjualan",
                backgroundColor: "#1af245",
                hoverBackgroundColor: "#e3f21a",
                borderColor: "#4e73df",
                data: [
                    <?php
                    foreach ($penjualanBarang as $hargaBarang) {
                        $harga_jual = $hargaBarang['sub_total_penjualan_detail'] . ', ';
                        echo $harga_jual;
                    }

                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'name'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6000
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: <?= $rowHargaJualMax['sub_total_penjualan_detail']; ?>,
                        maxTicksLimit: 10,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return 'Rp ' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rp ' + number_format(tooltipItem.yLabel);
                    }
                }
            },
        }
    });

    // Bar Grafik Jumlah
    var ctx = document.getElementById("grafik_jumlah");
    var chartJumlah = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                foreach ($jmlBarangTerjual as $nama) {
                    echo "'$nama[nama_barang]'" . ', ';
                }
                ?>
            ],
            datasets: [{
                label: "Jumlah Terjual",
                backgroundColor: "#8c0ca0",
                hoverBackgroundColor: "#e365f7",
                borderColor: "#4e73df",
                data: [
                    <?php
                    foreach ($jmlBarangTerjual as $jml) {
                        echo $jml['jumlah_penjualan_detail'] . ', ';
                    }

                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'name'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6000
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: <?= $rowMaxJml['jumlah_penjualan_detail']; ?>,
                        maxTicksLimit: 50,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            },
        }
    });
</script>

<?= $this->endSection(); ?>