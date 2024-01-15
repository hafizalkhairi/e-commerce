<?php


$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk=$id ");
$data = mysqli_fetch_array($query);

if (isset($_SESSION["id"])) {
    $id = $_SESSION['id'];
    $user = mysqli_query($conn, "SELECT * FROM users WHERE id_users = $id");
} ?>
<section class="container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="breadcrumb bg-transparent p-0">
                    <a class="breadcrumb-item active" href="./">Home</a>
                    <div class="breadcrumb-item ">Detail Produk</div>

                </nav>
            </div>
        </div>
    </div>
</section>



<section class="container mt-4">
    <div class="row container ">
        <div class="col-md-5  ">
            <img class="" style="border-radius: 10px; border-style: solid;
        border-width: 1px; border-color:#B0A695;" src="admin/produk/images/<?= $data['foto_produk'] ?>" alt="gmbr" width="450px;">

        </div>
        <div class="col-md-6 ml-5  pr-2">
            <p class="" style="font-weight:bold; font-size: 20px;;"><?= $data['nama_produk'] ?></p>
            <hr>
            <p class="" style="color:red; font-weight:bold; font-size: 17px;;">Rp. <?= number_format($data["harga"]); ?></p>

            <p class="" style="font-weight:bold; font-size: 17px;;">Stock : <?= $data["stock"]; ?></p>


            <form class="" action="" method="post">
                <label class="mt-4" for="">Jumlah</label>
                <div class="d-flex align-items-center justify-content-between" style="width: 150px;">
                    <input type="number" required name="banyak" id="banyak" class="form-control w-50" value="1" min="0"> Barang
                </div>
                <?php if (!isset($_SESSION["log"])) : ?>
                    <a href="?page=login" class="mt-4 btn btn-biru text-white " onclick="confirm('Silahkan Login Terlebih dahulu')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi bi-bag-check-fill mr-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                        </svg>
                        Add To Cart</a>

                <?php else : ?>
                    <input type="hidden" name="harga" id="" value="<?= $data['harga'] ?>">
                    <input type="hidden" name="stock" id="" value="<?= $data['stock'] ?>">
                    <input type="hidden" name="id_users" id="" value="<?= $id ?>">
                    <input type="hidden" name="id_produk" id="" value="<?= $data['id_produk'] ?>">
                    <button type="submit" name="proses" class="mt-4 btn btn-biru"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi bi-bag-check-fill mr-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                        </svg>
                        Add To Cart </button>
                <?php endif ?>
            </form>
        </div>
    </div>

    <hr class="p-3">
    <div class="row container ">
        <h4 class="container" style="font-weight: bold;">Deskripsi Barang</h4>
        <div class="container">
            <p><?= $data['deskripsi'] ?></p>
        </div>
    </div>
</section>

<?php

if (isset($_POST['proses'])) {

    $id_produk = $_POST['id_produk'];
    $banyak = $_POST["banyak"];
    $stock  =  $_POST["stock"];
    $harga = $_POST["harga"];


    $sisastock = $stock - $banyak;
    if ($sisastock < 0) {
        echo "<script>
            alert('Stock Barang Tidak Cukup');
        </script>";
        return false;
    }


    $total = $banyak * $harga;

    mysqli_query($conn, "INSERT INTO carts SET
        id_users = '$_POST[id_users]',
        id_produk = '$_POST[id_produk]',
        banyak = '$_POST[banyak]',
        total = '$total'
        
    ");


    $sisastock = $stock - $banyak;
    mysqli_query($conn, "UPDATE produk SET
        stock = '$sisastock'

        WHERE id_produk = $id_produk

    ");

    print "<script>
    alert('Barang Berhasil Masuk ke Keranjang') 
    window.location.href='?page=cart'
    </script>";
}
