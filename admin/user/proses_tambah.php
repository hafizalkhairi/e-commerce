<?php

include '../koneksi.php';

$nama = $_POST['nama'];
$telp = $_POST['telpon'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

$tambah = mysqli_query($conn, "insert into users (name, email, password, alamat, no_telepon, role) 
values('$nama','$email','$pass','$alamat','$telp', '$role')");


if ($tambah) {
    echo "<script>
        alert('Data berhasil disimpan');
        window.location.href='../?page=user/index';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal disimpan');
        window.location.href='../?page=user/tambah';
        </script>";
}
