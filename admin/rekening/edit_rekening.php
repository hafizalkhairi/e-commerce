<?php


$id = $_GET['rekening'];
$query = mysqli_query($conn, "SELECT * FROM rekening WHERE id_rekening=$id ");
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
                    <li class="breadcrumb-item active"><a href="?page=rekening/index">Rekening</a></li>
                    <li class="breadcrumb-item active"><a href="?page=rekening/edit_rekening&rekening=<?= $data['id_rekening'] ?>">Ubah Rekening</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Rekening</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="rekening/proses_edit.php" method="post">
                                <input type="hidden" name="id_rekening" value="<?php print $data['id_rekening'] ?>">
                                <div class="form-group">
                                    <label for="">Nama Bank</label>
                                    <input type="text" name="nama_bank" class="form-control input-default " value="<?= $data['nama_bank'] ?>" placeholder="Nama Bank" required>
                                </div>
                                <div class="form-group">
                                    <label for="">No Rekening</label>
                                    <input type="number" name="no_rekening" class="form-control input-default " value="<?= $data['no_rekening'] ?>" placeholder="No Rekening" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Rekening</label>
                                    <input type="text" name="nama_rekening" class="form-control input-default " value="<?= $data['nama_rekening'] ?>" placeholder="Nama Rekening" required>
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