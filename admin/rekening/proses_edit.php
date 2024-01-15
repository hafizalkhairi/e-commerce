<?php

include 'koneksi.php';

$id = $_POST['id_rekening'];
$nama_bank = $_POST['nama_bank'];
$no_rekening = $_POST['no_rekening'];
$nama_rekening = $_POST['nama_rekening'];



$ubah = mysqli_query($conn, "UPDATE rekening set 
        nama_bank = '$nama_bank',
        no_rekening = '$no_rekening',
        nama_rekening = '$nama_rekening'

        WHERE id_rekening = $id");

if ($ubah) {
    echo "<script>
        alert('Data berhasil disimpan');
        window.location.href='../?page=rekening/index';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal disimpan');
        window.location.href='?page=rekening/edit_rekening&rekening=$id';
        </script>";
}
