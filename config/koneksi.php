<?php
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost", "root", "", "db_store");

if (!$conn) {
	echo "gagal connect ke database";
} else {
};
