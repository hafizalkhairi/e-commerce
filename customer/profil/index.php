<?php

$id_users = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id_users=$id_users ");
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
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ubah Data Profil</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="profil/proses_edit.php" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group mt-3 col-md-6">
                                        <input type="hidden" name="id_users" value="<?= $data['id_users'] ?>">

                                        <label for="">Nama Lengkap</label>
                                        <input name="nama" type="text" class="form-control input-default " value="<?= $data['name'] ?>" placeholder="Nama">
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">Email</label>
                                        <input name="email" type="email" class="form-control input-default " value="<?= $data['email'] ?>" placeholder="Email">
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="">No Telpon</label>
                                        <input name="telpon" type="number" class="form-control input-default " value="<?= $data['no_telepon'] ?>" placeholder="No Hp">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Alamat Lengkap</label>
                                    <textarea class="form-control" name="alamat" id="editor" cols="30" rows="10" placeholder="Alamat Lengkap"><?= $data['alamat'] ?></textarea>
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
<!--**********************************
            Content body end
        ***********************************-->