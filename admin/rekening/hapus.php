<?php

include '../koneksi.php';

$id = $_GET['rekening'];

$hapus = mysqli_query($conn, "DELETE FROM rekening WHERE id_rekening = '$id'");

if ($hapus) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location.href='?page=rekening/index';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal dihapus');
        window.location.href='';
        </script>";
}
