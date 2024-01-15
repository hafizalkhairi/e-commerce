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
                    <li class="breadcrumb-item active"><a href="?page=kategori/tambah_kategori">Tambah Kategori</a></li>
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
                            <form action="kategori/proses_tambah.php" method="post">
                                <div class="form-group">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" name="kategori" class="form-control input-default " placeholder="Nama Kategori" required>
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