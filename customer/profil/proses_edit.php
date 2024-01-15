
<?php

include 'koneksi.php';

$id = $_POST['id_users'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];


$ubah = mysqli_query($conn, "UPDATE users set 
        name = '$nama',
        email = '$email',
        alamat = '$alamat',
        no_telepon = '$telpon'
 

        WHERE id_users = $id");

if ($ubah) {
        echo "<script>
        alert('Data berhasil disimpan');
        window.location.href='../?page=profil/index';
        </script>";
} else {
        echo "<script>
        alert('Data Gagal disimpan');
        window.location.href='../?page=index';
        </script>";
}
