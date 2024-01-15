<?php


$id = $_GET['produk'];
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk=$id ");
$data = mysqli_fetch_array($query);

?>



<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Berita</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active"><a href="?page=produk/index">Produk</a></li>
                    <li class="breadcrumb-item active"><a href="?page=produk/edit_produk&produk=<?= $data['id_produk'] ?>">Ubah Produk</a></li>

                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ubah Data Berita</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="produk/proses_ubah.php" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Nama Produk</label>
                                        <input type="hidden" name="id_produk" value="<?php print $data['id_produk'] ?>">
                                        <input type="text" name="nama_produk" class="form-control input-default " value="<?= $data['nama_produk'] ?>" placeholder="Nama produk" required>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Harga Produk (Rp.)</label>
                                        <input type="number" name="harga" class="form-control input-default " value="<?= $data['harga'] ?>" placeholder="Harga produk" required>
                                    </div>

                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Pilih Kategori</label>
                                        <select name="kategori" id="" class="form-control form-group">
                                            <option value="" selected>---Pilih kategori---</option>
                                            <?php


                                            $query = mysqli_query($conn, "SELECT * FROM kategori");
                                            while ($kategori = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $kategori['id_kategori'] ?>" <?= $kategori['id_kategori'] == $data['id_kategori'] ? 'selected' : '' ?>>
                                                    <?= $kategori['nama_kategori'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Stock produk</label>
                                        <input type="number" name="stock" class="form-control input-default" value="<?= $data['stock'] ?>" placeholder="Stock produk" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Deskripsi produk</label>
                                    <textarea class="form-control" name="deskripsi" id="editor" cols="30" rows="10" placeholder="Deskripsi produk"><?= $data['deskripsi'] ?></textarea>
                                </div>

                                <label class="mt-3" for="foto_produk">Foto Produk</label><br>
                                <img class="mb-3" src="produk/images/<?= $data['foto_produk'] ?>" alt="cek" width="250px;">

                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="gambar_produk" class="custom-file-input" value="<?= $data['foto_produk'] ?>">
                                        <input type="hidden" name="gambar_lama" value="<?= $data['foto_produk'] ?>"><br>
                                        <label class="custom-file-label" style="width: 250px;">Choose file</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary fa fa-save" type="submit"> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>

<body>
    <form action="proses_ubah.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_berita" value="<?= $ubah['id_berita'] ?>">



        <label for="">Judul</label>
        <input type="text" name="judul" value="<?= $ubah['judul_berita'] ?>" required><br><br>

        <label for="">Tanggal</label>
        <input type="date" name="tanggal" value="<?= $ubah['tanggal_berita'] ?>" required><br><br>

        <label for="">isi</label>
        <input type="text" name="isi" value="<?= $ubah['isi_berita'] ?>" required> <br> <br>

        <label for="">Gambar Berita</label><br>
        <img src="images/<?= $ubah['gambar_berita'] ?>" width="100px" alt="">
        <input type="hidden" name="gambar_lama" value="<?= $ubah['gambar_berita'] ?>"><br>
        <input type="file" name="gambar_berita" value="<?= $ubah['gambar_berita'] ?>"><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>