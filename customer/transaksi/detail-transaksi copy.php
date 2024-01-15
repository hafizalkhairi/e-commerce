<?php

$id = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT * FROM users WHERE id_users = $id");


$id_transaksi = $_GET["id"];
$detail = mysqli_query($conn, "SELECT * FROM detail_transaksi INNER JOIN  transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi INNER JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE detail_transaksi.id_transaksi = $id_transaksi");


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
                        $kode = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = $id_transaksi");
                        $kd = mysqli_fetch_array($kode)
                        ?>
                        <div class="mb-2" style="color:black; font-size:20px;">
                            Kode Transaksi : <strong><?= $kd["code"]; ?></strong>
                        </div>

                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead style="font-weight: bold; ">
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

                                $banyak = 0;
                                $total = 0;
                                ?>

                                <?php foreach ($transaction_details as $trans) : ?>

                                    <?php
                                    $idProduct = $t["product_id"];
                                    $product = mysqli_query($conn, "SELECT * FROM products WHERE products.id_product = $idProduct");
                                    $gallery =  mysqli_query($conn, "SELECT * FROM products_galleries INNER JOIN products ON products_galleries.product_id = products.id_product WHERE products_galleries.product_id = $idProduct");
                                    $banyak += $t["banyak"];
                                    $total = $t["price"] * $t["banyak"];
                                    ?>
                                    <td><img width="60%" src="admin/produk/images/<?= $detail['foto_produk'] ?>" alt="gmbr" srcset=""></td>
                                    <td><?= $cart['nama_produk'] ?></td>
                                    <td><?= $cart['banyak'] ?></td>
                                    <td>Rp. <?= number_format($cart["harga"]); ?></td>
                                    <td>Rp. <?= number_format($cart["total"]); ?></td>
                                    <td>
                                        <a class='btn btn-danger fa fa-trash' href='?page=config/hapus-cart&id=<?= $cart['id_cart'] ?>&produk=<?= $cart['id_produk'] ?>' onclick="return confirm('Apakah Anda Yakin Menghapus Barang Ini?')"></a>

                                    </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>