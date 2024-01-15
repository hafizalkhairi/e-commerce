<?php

$id_transaksi = $_GET["id"];

$status_transaksi = 'TERKIRIM';

$kirim = mysqli_query($conn, "UPDATE transaksi SET 
status_transaksi = '$status_transaksi'

WHERE id_transaksi = '$id_transaksi'
");
print "
<script>
alert('Barang dikirim ke Customer')
window.location.href='?page=transaksi/semua_transaksi'
</script>
";
