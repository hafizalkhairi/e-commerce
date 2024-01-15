<?php

//hitung jml kategori
$query = mysqli_query($conn, "SELECT COUNT(id_kategori) AS jumlah_kategori FROM kategori");
$kategori = mysqli_fetch_array($query);

//hitung jml produk
$query = mysqli_query($conn, "SELECT COUNT(id_produk) AS jumlah_produk FROM produk");
$produk = mysqli_fetch_array($query);

//hitung jml user
$query = mysqli_query($conn, "SELECT COUNT(id_users) AS jumlah_users FROM users");
$users = mysqli_fetch_array($query);


//hitung transaksi
$query = mysqli_query($conn, "SELECT SUM(total_transaksi) AS total FROM transaksi WHERE status_transaksi = 'SELESAI'");
$total = mysqli_fetch_array($query);



//hitung transaksi selesai



?>



<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Penghasilan</div>
                            <div class="stat-digit">Rp. <?= number_format($total['total']) ?></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 ">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Kategori </div>
                            <div class="stat-digit"><?= $kategori['jumlah_kategori'] ?></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Produk</div>
                            <div class="stat-digit"><?= $produk['jumlah_produk'] ?></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total User</div>
                            <div class="stat-digit"><?= $users['jumlah_users'] ?></div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->

        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->