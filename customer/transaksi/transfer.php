<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Upload Bukti Transfer</h4>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body" style="color: black;">
                        <div class="row ">
                            <?php

                            $id_transaksi = $_GET["id"];
                            $transaksi = mysqli_query($conn, "SELECT * FROM transaksi JOIN rekening ON transaksi.id_rekening = rekening.id_rekening WHERE transaksi.id_transaksi = $id_transaksi");
                            $data = mysqli_fetch_array($transaksi);

                            ?>
                            <div class="col-12">
                                <h5 class="mb-4">Transfer ke No Rekening Ini</h5>
                                <hr>
                                <div class="mb-2">
                                    Nama Bank : <strong><?= $data["nama_bank"]; ?></strong>
                                </div>
                                <div class="mb-2">
                                    No Rekening: <strong><?= $data["no_rekening"]; ?></strong>
                                </div>
                                <div class="mb-2">
                                    Atas Nama : <strong><?= $data["nama_rekening"]; ?></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="photo">Upload Foto</label>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="file" name="foto_bukti" id="photo">
                                        <input type="hidden" name="id_transaksi" value="<?= $id_transaksi; ?>">
                                    </div>
                                    <div class=" text-left mt-4">
                                        <button type="submit" class="btn btn-primary text-white fa fa-upload" name="proses"> Upload Bukti</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

if (isset($_POST['proses'])) {

    $id_transaksi = $_POST['id_transaksi'];

    //ambil data file
    $namafile = $_FILES['foto_bukti']['name'];
    $namasementara = $_FILES['foto_bukti']['tmp_name'];

    //pindahkan file
    $terupload = move_uploaded_file($namasementara, 'gambar/' . $namafile);

    $upload = mysqli_query($conn, "UPDATE transaksi SET
        foto_bukti = '$namafile'

        WHERE id_transaksi = $id_transaksi
    ");


    print "
        <script>
            alert('Bukti Transfer Berhasil dikirim, tunggu konfirmasi dari admin')
            window.location.href='?page=transaksi/index'
        </script>  
        ";
}


?>