<?php

include '../koneksi.php';

$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$stock = $_POST['stock'];
$deskripsi = $_POST['deskripsi'];

//ambil data file
$namafile = $_FILES['gambar_produk']['name'];
$namasementara = $_FILES['gambar_produk']['tmp_name'];

//pindahkan file
$terupload = move_uploaded_file($namasementara, 'images/' . $namafile);

$tambah = mysqli_query($conn, "INSERT INTO produk (nama_produk, id_kategori, harga, stock, deskripsi, foto_produk)  VALUES ('$nama_produk', '$kategori', '$harga', '$stock', '$deskripsi', '$namafile')");


if ($tambah) {
    echo "<script>
    alert('Data berhasil disimpan');
    window.location.href='../?page=produk/index';
    </script>";
} else {
    echo "<script>
    alert('Data Gagal disimpan');
    window.location.href='../?page=produk/tambah_produk';
    </script>";
}
