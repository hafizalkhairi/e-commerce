<?php


if (!isset($_SESSION['log'])) {
} else {
  header('location:index.php');
};

include 'config/koneksi.php';
date_default_timezone_set("Asia/Bangkok");
$timenow = date("j-F-Y-h:i:s A");

if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);
  $queryuser = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  $cariuser = mysqli_fetch_assoc($queryuser);

  if (password_verify($pass, $cariuser['password'])) {
    $_SESSION['id'] = $cariuser['id_users'];
    $_SESSION['role'] = $cariuser['role'];
    $_SESSION['telpon'] = $cariuser['no_telepon'];
    $_SESSION['name'] = $cariuser['name'];
    $_SESSION['log'] = "Logged";


    print "<script> 
            alert('login Berhasil') 
            window.location.href='?page=home/index'
            </script>";
  } else {
    print "<script> 
            alert('login gagal') 
            window.location.href='?page=login'
            </script>";
  }
}

?>



<!--Page Content-->
<div class="page-content page-auth ">
  <section class="store-auth" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center row-login">
        <div class="col-lg-6 text-center">
          <img src="aset/gambar/gamer.png" alt="" class="w-50 mb-lg-none" />
        </div>
        <div class="col-lg-5 mt-5 container">
          <h3 class="mb-4" style="padding-right: 50px;">Belanja komputer dan perlengkapannya menjadi lebih mudah</h3>
          <form action="" method="POST" class="mt-3" style="margin-bottom: 90px;;">

            <div class="form-group ">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control w-75" autofocus required />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control w-75" />

            </div>
            <button type="submit" name="login" class="btn btn-biru btn-block w-75 mt-4">Login ke Akun</button>
            <a href="?page=register" class="btn btn-light btn-block w-75 mt-2" ;">Daftar</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<!--Akhir Page Content-->