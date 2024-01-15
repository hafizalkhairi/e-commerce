<?php

include 'koneksi.php';

$id = $_POST['id_kategori'];
$kategori = $_POST['kategori'];
$slug = str_replace('+', '-', urlencode($kategori));


$ubah = mysqli_query($conn, "UPDATE kategori set 
        nama_kategori = '$kategori',
        slug = '$slug'

        WHERE id_kategori = $id");

if ($ubah) {
    echo "<script>
        alert('Data berhasil disimpan');
        window.location.href='../?page=kategori/index';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal disimpan');
        window.location.href='?page=kategori/edit_kategori&kategori=$id';
        </script>";
}
