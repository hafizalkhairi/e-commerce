<?php

include 'koneksi.php';

$id = $_GET['produk'];

$hapus = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id'");

if ($hapus) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location.href='?page=produk/index';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal dihapus');
        window.location.href='?page=produk/index';
        </script>";
}
