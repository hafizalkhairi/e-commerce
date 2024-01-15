<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active"><a href="?page=produk/index">Produk</a></li>
                    <li class="breadcrumb-item active"><a href="?page=produk/tambah_produk">Tambah Produk</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Input Data produk</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="produk/proses_tambah.php" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Nama Produk</label>
                                        <input type="text" name="nama_produk" class="form-control input-default " placeholder="Nama produk" required>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Harga Produk (Rp.)</label>
                                        <input type="number" name="harga" class="form-control input-default " placeholder="Harga produk" required>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Pilih Kategori</label>
                                        <select name="kategori" id="" class="form-control form-group">
                                            <option value="" selected>---Pilih Kategori---</option>
                                            <?php
                                            include '../koneksi.php';

                                            $query = mysqli_query($conn, "SELECT * FROM kategori");
                                            while ($kategori = mysqli_fetch_array($query)) {
                                                print "
                                            <option value='$kategori[id_kategori]'>$kategori[nama_kategori]</option>
                                            ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Stock produk</label>
                                        <input type="number" name="stock" class="form-control input-default" placeholder="Stock produk" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Deskripsi produk</label>
                                    <textarea class="form-control" name="deskripsi" id="editor" cols="30" rows="10" placeholder="Deskripsi produk"></textarea>
                                </div>

                                <label class="mt-3" for="foto_produk">Foto Produk</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="gambar_produk" class="custom-file-input">
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
<!--**********************************
            Content body end
        ***********************************-->