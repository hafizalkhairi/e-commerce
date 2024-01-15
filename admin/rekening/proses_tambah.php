<?php

include '../koneksi.php';

$nama_bank = $_POST['nama_bank'];
$no_rekening = $_POST['no_rekening'];
$nama_rekening = $_POST['nama_rekening'];


$tambah = mysqli_query($conn, "INSERT INTO rekening (nama_bank, no_rekening, nama_rekening) VALUES ('$nama_bank', '$no_rekening', '$nama_rekening')");


if ($tambah) {
    echo "<script>
        alert('Data berhasil disimpan');
        window.location.href='../?page=rekening/index';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal disimpan');
        window.location.href='../?page=rekening/tambah_rekening';
        </script>";
}
