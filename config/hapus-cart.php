<?php

include 'koneksi.php';


$id_produk = $_GET['produk'];
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
$produk = mysqli_fetch_array($query);
$stock = $produk['stock'];

$id = $_GET['id'];
$cartquery = mysqli_query($conn, "SELECT * FROM carts WHERE id_cart= '$id'");
$cart = mysqli_fetch_array($cartquery);
$banyak = $cart['banyak'];

$id = $_GET['id'];
$hapus = mysqli_query($conn, "DELETE FROM carts WHERE id_cart= '$id'");


$sisabarang = $stock + $banyak;

if ($hapus) {

    mysqli_query($conn, "UPDATE produk SET 
        stock = '$sisabarang'

        WHERE id_produk = $id_produk
    ");
    echo "<script>
        alert('Barang berhasil dihapus');
        window.location.href='?page=cart';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal dihapus');
        window.location.href='';
        </script>";
}
