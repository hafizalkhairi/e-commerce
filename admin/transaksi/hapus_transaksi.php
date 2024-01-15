<?php

include '../koneksi.php';

$id_transaksi = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");

if ($hapus) {
    echo "<script>
        alert('Data  Transaksi Berhasil dihapus');
        window.location.href='?page=transaksi/semua_transaksi';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal dihapus');
        window.location.href='?page=transaksi/semua_transaksi';
        </script>";
}
