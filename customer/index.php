<?php

//jika tidak ada session(belum ada)
session_start();

include "koneksi.php";
include "layout/header.php";
include "layout/sidebar.php";
include "content.php";
include "layout/footer.php";
