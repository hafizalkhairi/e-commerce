<?php

if (!isset($_SESSION['log'])) {
} else {
    header('location:index.php');
};
include 'config/koneksi.php';

if (isset($_POST['register'])) {
    $nama = $_POST['name'];
    $telp = $_POST['telpon'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $tambahuser = mysqli_query($conn, "insert into users (name, email, password, alamat, no_telepon, role) 
		values('$nama','$email','$pass','$alamat','$telp', 'User')");
    if ($tambahuser) {
        print "<script> 
            alert('Pendaftaran Akun berhasil, silahkan Login') 
            window.location.href='?page=login'
            </script>";
    } else {
        print "<script> 
            alert('Gagal melakukan pendaftaran, silahkan coba lagi') 
            window.location.href='?page=register'
            </script>";
    }
};

?>


<!--Page Content-->
<div class="page-content page-auth" id="register">
    <section class="store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
                <div class="col-lg-5">
                    <h2 class="mb-4">
                        Untuk melakukan transaksi<br />
                        silahkan daftar terlebih dahulu
                    </h2>

                    <form action="" class="mt-3 mb-5" method="POST">

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describeby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="telpon">Nomor Telepon</label>
                            <input type="number" name="telpon" id="telpon" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <button type="submit" name="register" class="btn btn-biru btn-block mt-4">Daftar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!--Akhir Page Content-->