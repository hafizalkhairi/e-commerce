<?php


$id = $_GET['kategori'];
$query = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori=$id ");
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
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active"><a href="?page=kategori/index">Kategori</a></li>
                    <li class="breadcrumb-item active"><a href="?page=kategori/edit_kategori&kategori=<?= $data['id_kategori'] ?>">Ubah Kategori</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Input Data Kategori</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="kategori/proses_edit.php" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="id_kategori" value="<?php print $data['id_kategori'] ?>">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" name="kategori" class="form-control input-default " value="<?php print $data['nama_kategori'] ?>" placeholder="Nama Kategori" required>
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