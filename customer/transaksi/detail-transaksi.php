<?php

$id = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT * FROM users WHERE id_users = $id");



?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>

                </div>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?php

                        $id_transaksi = $_GET["id"];
                        $kode = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = $id_transaksi");
                        $kd = mysqli_fetch_array($kode);

                        ?>
                        <div class="mb-2" style="color:black; font-size:20px;">
                            Kode Transaksi : <strong><?= $kd["code"]; ?></strong>
                        </div>

                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead style="font-weight: bold; color:black;">
                                <tr>
                                    <th style="width:20%" class="">Foto Produk</th>
                                    <th style="width:30%" class="">Nama Produk</th>
                                    <th style="width:10%" class="">Banyak</th>
                                    <th class="">Harga</th>
                                    <th class="">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $id_transaksi = $_GET["id"];
                                $detail = mysqli_query($conn, "SELECT * FROM detail_transaksi JOIN  transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE detail_transaksi.id_transaksi = $id_transaksi");
                                $banyak = 0;
                                $total = 0;
                                ?>

                                <?php foreach ($detail as $detail) : ?>
                                    <?php
                                    $id_produk = $detail["id_produk"];
                                    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE produk.id_produk = $id_produk");
                                    $banyak += $detail["banyak"];
                                    $total = $detail["harga"] * $detail['banyak'];
                                    ?>
                                    <tr>
                                        <td><img width="60%" src="../admin/produk/images/<?= $detail['foto_produk'] ?>" alt=""></td>
                                        <td><?= $detail['nama_produk'] ?></td>
                                        <td><?= $detail['banyak'] ?></td>
                                        <td>Rp. <?= number_format($detail["harga"]); ?></td>
                                        <td>Rp. <?= number_format($total); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <hr>
                        <form action="" method="post">
                            <div class="container mt-5">
                                <p style="font-size: 19px; color:black; font-weight:bold;">Detail Pengrimiman</p>
                                <?php
                                $id = $_SESSION['id'];
                                $query = mysqli_query($conn, "SELECT * FROM users WHERE id_users = '$id' ");
                                $data = mysqli_fetch_array($query);

                                ?>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>No HP / WA</label>
                                        <input disabled type="number" name="no_telp" class="form-control" value="<?= $data['no_telepon'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Pilih Pembayaran</label>
                                        <select disabled id="inputState" name="rekening" class="form-control" required>

                                            <?php
                                            include '../koneksi.php';

                                            $id_transaksi = $_GET["id"];
                                            $query = mysqli_query($conn, "SELECT * FROM rekening JOIN transaksi ON rekening.id_rekening=transaksi.id_rekening WHERE transaksi.id_transaksi=$id_transaksi");
                                            while ($rekening = mysqli_fetch_array($query)) {
                                                print "
                                            <option value='$rekening[id_rekening]'>$rekening[nama_bank]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2 col-md-12">
                                        <label for="">Alamat Lengkap</label>
                                        <input readonly class="form-control" name="alamat" id="" value="<?= $data['alamat'] ?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </form>

                        <div class="container">
                            <p class="mt-5" style="font-size: 19px; font-weight:bold; color:black">Bukti Pembayaran</p>

                            <?php

                            $id_transaksi = $_GET["id"];
                            $kode = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = $id_transaksi");
                            $kd = mysqli_fetch_array($kode);

                            if (!empty($kd['foto_bukti'])) {
                                print "
                        <img src='gambar/$kd[foto_bukti]' alt='gmbr' width='30%;'>
                        
                        ";
                            } else {
                                print "<p style='color:red;'>Bukti Pembayaran Belum diupload</p>";
                            }
                            ?>
                            <hr>
                        </div>

                        <div class="container mt-5" style="color:black">
                            <p style="font-size: 19px; font-weight:bold; color:black">Informasi Produk</p>
                            <div class="row ">
                                <div class="col-md-2">
                                    <p style="font-weight: bold;">Jumlah Barang</p>
                                </div>
                                <div class="col-md-2 ">
                                    <p><?= number_format($banyak); ?></p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-2 ">
                                    <p style="font-weight: bold;">Total Harga</p>
                                </div>
                                <div class="col-md-2 ">
                                    <p style="color: red;">Rp. <?= number_format($kd['total_transaksi']); ?></p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-2">
                                    <p style="font-weight: bold;">Status Transaksi</p>
                                </div>
                                <div class="col-md-2 ">
                                    <?php if ($kd["status_transaksi"] == 'BELUM KONFIRMASI') : ?>
                                        <p class="text-danger" style="font-weight: bold;"><?= ($kd["status_transaksi"]); ?></p>
                                    <?php elseif ($kd["status_transaksi"] == 'TERKONFIRMASI') : ?>
                                        <p class="text-warning" style="font-weight: bold;"><?= ($kd["status_transaksi"]); ?></p>
                                    <?php elseif ($kd["status_transaksi"] == 'TERKIRIM') : ?>
                                        <p class="text-info" style="font-weight: bold;"><?= ($kd["status_transaksi"]); ?></p>
                                    <?php else : ?>
                                        <p class="text-success" style="font-weight: bold;"><?= ($kd["status_transaksi"]); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <input type="hidden" name="id_users" value="<?= $id ?>">
                            <input type="hidden" name="total" value="<?= $total ?>">
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>