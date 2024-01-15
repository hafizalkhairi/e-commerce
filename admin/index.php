<?php

//jika tidak ada session(belum ada)
session_start();
if (!isset($_SESSION['log'])) {
    echo "<script>
        alert('Silahkan Login Terlebih Dahulu');
        window.location.href='../?page=login';
    </script>";
}

include "koneksi.php";
include "layout/header.php";
include "layout/sidebar.php";
include "content.php";
include "layout/footer.php";
