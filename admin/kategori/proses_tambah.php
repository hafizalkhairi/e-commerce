<?php

include '../koneksi.php';

$kategori = $_POST['kategori'];
$slug = str_replace('+', '-', urlencode($kategori));

$tambah = mysqli_query($conn, "INSERT INTO kategori (nama_kategori, slug) VALUES ('$kategori', '$slug')");


if ($tambah) {
    echo "<script>
        alert('Data berhasil disimpan');
        window.location.href='../?page=kategori/index';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal disimpan');
        window.location.href='../?page=kategori/tambah_kategori';
        </script>";
}
