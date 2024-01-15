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
                    <li class="breadcrumb-item active"><a href="?page=user/tambah_user">Tambah User</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Input User Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="user/proses_tambah.php" method="post">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input name="nama" type="text" class="form-control input-default " placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" type="email" class="form-control input-default " placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input name="password" type="text" class="form-control input-default " placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input name="alamat" type="text" class="form-control input-default " placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="">No Telpon</label>
                                    <input name="telpon" type="number" class="form-control input-default " placeholder="No Hp">
                                </div>
                                <div class="form-group ">
                                    <label>Level</label>
                                    <select name="role" id="inputState" class="form-control">
                                        <option selected>Pilih Level</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
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