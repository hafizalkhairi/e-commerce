<?php

include '../koneksi.php';

$id = $_GET['user'];

$hapus = mysqli_query($conn, "DELETE FROM users WHERE id_users = '$id'");

if ($hapus) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location.href='?page=user/index';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal dihapus');
        window.location.href='';
        </script>";
}
