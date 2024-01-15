<?php


$id = $_GET['user'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id_users=$id ");
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
                    <li class="breadcrumb-item active"><a href="?page=user/index">User</a></li>
                    <li class="breadcrumb-item active"><a href="?page=user/edit_user&user=<?= $data['id_users'] ?>">Ubah User</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data User</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="user/proses_edit.php" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="id_users" value="<?php print $data['id_users'] ?>">

                                    <label for="">Nama Lengkap</label>
                                    <input name="nama" type="text" class="form-control input-default " value="<?php print $data['name'] ?>" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" type="email" class="form-control input-default " value="<?php print $data['email'] ?>" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="hidden" name="passlama" value="<?php print $data['password'] ?>">
                                    <input name="password" type="text" class="form-control input-default " placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input name="alamat" type="text" class="form-control input-default " value="<?php print $data['alamat'] ?>" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="">No Telpon</label>
                                    <input name="telpon" type="number" class="form-control input-default " value="<?php print $data['no_telepon'] ?>" placeholder="No Hp">
                                </div>
                                <div class="form-group ">
                                    <label>Level</label>
                                    <select name="role" id="inputState" class="form-control">

                                        <option value="<?= $data['role'] ?>" selected><?= $data['role'] ?></option>
                                        <option value="ADMIN">Admin</option>
                                        <option value="USER">User</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary fa fa-save mt-3" type="submit"> Simpan</button>
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