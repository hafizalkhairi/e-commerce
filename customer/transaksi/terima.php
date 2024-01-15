<?php

$id_transaksi = $_GET["id"];

$status_transaksi = 'SELESAI';

$kirim = mysqli_query($conn, "UPDATE transaksi SET 
status_transaksi = '$status_transaksi'

WHERE id_transaksi = '$id_transaksi'
");
print "
<script>
alert('Barang Telah diterima, Proses Transaksi Dinyatakan Selesai')
window.location.href='?page=transaksi/index'
</script>
";
