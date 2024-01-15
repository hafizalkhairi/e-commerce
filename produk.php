<?php

$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY  id_kategori")

?>

<section class="container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="breadcrumb bg-transparent p-0">
                    <a class="breadcrumb-item active" href="./">Home</a>
                    <div class="breadcrumb-item ">Produk</div>

                </nav>
            </div>
        </div>
    </div>
</section>

<section class="container mt-3" id="product">
    <div class="container">
        <div class="row justify-content-between mb-2">
            <div class="col-lg-4" data-aos="fade-up">
                <?php
                if (isset($_POST['kategori'])) {
                    $nama_kate = mysqli_query($conn, "SELECT * from kategori WHERE id_kategori='$_POST[kategori]'");
                    $kate = mysqli_fetch_array($nama_kate);
                } ?>
                <?php if (isset($_POST['kategori'])) : ?>
                    <h5 class="mb-1"><?= $kate["nama_kategori"]; ?></h5>
                <?php else : ?>
                    <h5 class="mb-1">All Products</h5>
                <?php endif; ?>
                <p class="text-muted">Tersedia berbagai macam pilihan</p>
            </div>

            <div class="col-lg-4">
                <form action="" method="POST">
                    <div class="form-group">
                        <select name="kategori" id="kategori" class="form-control" onchange="this.form.submit()">
                            <option value="" disabled selected>---Pilih Kategori---</option>
                            <?php foreach ($kategori as $kategori) : ?>
                                <option value="<?= $kategori["id_kategori"]; ?>"><?= $kategori["nama_kategori"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
if (isset($_POST['kategori'])) {
    $query = mysqli_query($conn, "SELECT * FROM produk WHERE id_kategori='$_POST[kategori]' ORDER BY id_produk DESC");
    $kat = mysqli_fetch_assoc($query);
} ?>

<?php if (isset($_POST['kategori'])) : ?>
    <section class="container mt-3 ">
        <div class="row container align-item-center ">
            <div class="col-6  col-md-3">
                <div class="card mb-4 shadow-lg">

                    <div class="produk-container">
                        <a href="?page=detail&id=<?= $kat['id_produk'] ?>"><img class="card-img-top" src="admin/produk/images/<?= $kat['foto_produk'] ?>" alt="Card image cap"></a>
                        <div class="overlay"></div>
                    </div>

                    <div class="card-body shadow-lg " style="height: 225px;;">
                        <div class="row align-content-center">
                            <div class="text-center p-1 p-1 " style="height: 150px; width:100%;">
                                <p class="card-title text-center mb-4"><a style="font-size: 15px;  font-weight: bold;" class="" href="?page=detail&id=<?= $kat['id_produk'] ?>"><?= $kat['nama_produk'] ?></a></p>
                            </div>

                            <div class="card-footer text-center" style="width: 100%;">
                                <a href="?page=detail&id=<?= $kat['id_produk'] ?>" class="text-danger">Rp. <?= number_format($kat["harga"]); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php else : ?>
    <section class="container mt-3 ">
        <div class="row container align-item-center ">
            <!-- Card produk -->

            <?php
            $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
            foreach ($query as $data) {
            ?>
                <div class="col-6  col-md-3">
                    <div class="card mb-4 shadow-lg">

                        <div class="produk-container">
                            <a href="?page=detail&id=<?= $data['id_produk'] ?>"><img class="card-img-top" src="admin/produk/images/<?= $data['foto_produk'] ?>" alt="Card image cap"></a>
                            <div class="overlay"></div>
                        </div>

                        <div class="card-body shadow-lg " style="height: 225px;;">
                            <div class="row align-content-center">
                                <div class="text-center p-1 p-1 " style="height: 150px; width:100%;">
                                    <p class="card-title text-center mb-4"><a style="font-size: 15px;  font-weight: bold;" class="" href="?page=detail&id=<?= $data['id_produk'] ?>"><?= $data['nama_produk'] ?></a></p>
                                </div>

                                <div class="card-footer text-center" style="width: 100%;">
                                    <a href="?page=detail&id=<?= $data['id_produk'] ?>" class="text-danger">Rp. <?= number_format($data["harga"]); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php endif; ?>