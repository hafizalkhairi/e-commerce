<?php


$id = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT * FROM users WHERE id_users = $id");


?>


<section class="container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="breadcrumb bg-transparent p-0">
                    <a class="breadcrumb-item active" href="./">Home</a>
                    <div class="breadcrumb-item ">Cart</div>

                </nav>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>

    <div class="container mt-4">
        <table class="container">
            <thead style="font-weight: bold; ">
                <tr>
                    <th style="width:20%" class="">Foto Produk</th>
                    <th style="width:30%" class="">Nama Produk</th>
                    <th style="width:10%" class="">Banyak</th>
                    <th class="">Harga</th>
                    <th class="">Total</th>
                    <th style="width:5%" class="">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = $_SESSION['id'];
                $cart = mysqli_query($conn, "SELECT * FROM users 
                JOIN carts  ON users.id_users=carts.id_users JOIN produk ON carts.id_produk=produk.id_produk WHERE users.id_users='$id'");
                $banyak = 0;
                $total = 0;
                ?>
                <?php foreach ($cart as $cart) : ?>
                    <?php
                    $id_produk = $cart["id_produk"];
                    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE produk.id_produk = $id_produk");
                    $banyak += $cart["banyak"];
                    $total += $cart["total"];
                    ?>
                    <tr>
                        <td><img width="60%" src="admin/produk/images/<?= $cart['foto_produk'] ?>" alt="gmbr" srcset=""></td>
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

        <form action="" method="POST">
            <!-- detail pengiriman -->

            <div class="container mt-5">
                <p style="font-size: 19px; font-weight:bold;">Detail Pengrimiman</p>
                <?php
                $id = $_SESSION['id'];
                $query = mysqli_query($conn, "SELECT * FROM users WHERE id_users = '$id' ");
                $data = mysqli_fetch_array($query);

                ?>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>No HP / WA</label>
                        <input type="number" name="no_telp" class="form-control" value="<?= $data['no_telepon'] ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Pilih Pembayaran</label>
                        <select id="inputState" name="rekening" class="form-control" required>
                            <option disabled selected>--Pilih Pembayaran--</option>
                            <?php
                            include '../koneksi.php';

                            $query = mysqli_query($conn, "SELECT * FROM rekening");
                            while ($rekening = mysqli_fetch_array($query)) {
                                print "
                                <option value='$rekening[id_rekening]'>$rekening[nama_bank]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mt-2 col-md-12">
                        <label for="">Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat" id="editor" required><?= $data['alamat'] ?></textarea>
                    </div>
                </div>

            </div>
            <hr>


            <!-- informasi pembayaran -->

            <div class="container mt-5 ">
                <p style="font-size: 19px; font-weight:bold;">Informasi Pembayaran</p>
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
                        <p style="color: red;">Rp. <?= number_format($total); ?></p>
                    </div>
                </div>
                <input type="hidden" name="id_users" value="<?= $id ?>">
                <input type="hidden" name="total" value="<?= $total ?>">

                <div class="row container mt-5">
                    <button name="proses" class="btn btn-success" type="submit"><i class="fa fa-check-square mr-1"></i> Checkout Sekarang</button>
                </div>
            </div>

        </form>
</section>


<?php

include 'config/koneksi.php';


$id = $_SESSION['id'];

$code = mysqli_query($conn, "SELECT max(code) as kodeTerbesar FROM transaksi");
$data = mysqli_fetch_array($code);
$kodetransaksi = $data['kodeTerbesar'];

$urutan = (int) substr($kodetransaksi, 5, 5);
$urutan++;
$huruf = "TR-";
$kodetransaksi = $huruf . sprintf("%05s", $urutan);


if (isset($_POST['proses'])) {


    if ($total == 0) {
        echo "<script>
                    alert('Keranjang Kosong, Pilih Produk Terlebih dahulu');
                </script>";
        return false;
    }

    if (empty($_POST['alamat'])) {
        echo "<script>
                alert('Masukkan Alamat Terlebih dahulu');
            </script>";
        return false;
    }
    if (empty($_POST['rekening'])) {
        echo "<script>
                alert('Pembayaran Harus dipilih Terlebih dahulu');
            </script>";
        return false;
    }


    $query = mysqli_query($conn, "INSERT INTO transaksi  SET
        code = '$kodetransaksi',
        id_users = $_POST[id_users],
        total_transaksi = $_POST[total],
        id_rekening = $_POST[rekening],
        status_transaksi = 'BELUM KONFIRMASI',
        foto_bukti  = ''

    ");


    $id = $_SESSION['id'];

    $carts = mysqli_query($conn, "SELECT * FROM carts INNER JOIN produk ON carts.id_produk = produk.id_produk WHERE carts.id_users = $id");
    $dataTransaksi = mysqli_query($conn, "SELECT * FROM transaksi");

    foreach ($carts as $cart) {
        foreach ($dataTransaksi as $id_transaksi) {
            $transaction_id = $id_transaksi["id_transaksi"];
        }
        $id_product = $cart["id_produk"];

        $productPrice = $cart["harga"];
        $banyak = $cart["banyak"];
        $queryTransactionDetails = mysqli_query($conn,  "INSERT INTO detail_transaksi
        VALUES
        ('', '$transaction_id', '$id_product', '$banyak', '$productPrice')
        ");
    }

    mysqli_query($conn, "DELETE FROM carts WHERE id_users = $id");

    print "
        <script>
        alert('Transaksi Diproses, Silahkan Upload bukti Pembayaran Pada Halaman Dashboard')
            window.location.href='customer/index.php'
        </script>  
    ";
}
?>