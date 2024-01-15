
<?php

include 'koneksi.php';

$id = $_POST['id_users'];
$nama = $_POST['nama'];
$passlama = $_POST['passlama'];
$email = $_POST['email'];
if (empty($_POST["password"])) {
    $password = $passlama;
} else {
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
}

$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$role = $_POST['role'];

$ubah = mysqli_query($conn, "UPDATE users set 
        name = '$nama',
        email = '$email',
        password = '$password',
        alamat = '$alamat',
        no_telepon = '$telpon',
        role = '$role'

        WHERE id_users = $id");

if ($ubah) {
    echo "<script>
        alert('Data berhasil disimpan');
        window.location.href='../?page=user/index';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal disimpan');
        window.location.href='../?page=user/edit_user';
        </script>";
}
