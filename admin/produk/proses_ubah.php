<?php

include 'koneksi.php';

$id = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$stock = $_POST['stock'];
$deskripsi = $_POST['deskripsi'];

if ($_FILES['gambar_produk']['name'] == "") {
    $namafile = $_POST['gambar_lama'];
} else {
    $namafile = $_FILES['gambar_produk']['name'];
    $namasementara = $_FILES['gambar_produk']['tmp_name'];


    $terupload = move_uploaded_file($namasementara, 'images/' . $namafile);
}

$ubah = mysqli_query($conn, "UPDATE produk set 
        nama_produk = '$nama_produk',
        id_kategori = '$kategori',
        harga = '$harga',
        stock = '$stock',
        deskripsi = '$deskripsi',
        foto_produk = '$namafile'

        WHERE id_produk = $id");
if ($ubah) {
    echo "<script>
        alert('Data berhasil disimpan');
        window.location.href='../?page=produk/index';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal disimpan');
        window.location.href='?page=produk/edit_produk&produk=$id';
        </script>";
}
