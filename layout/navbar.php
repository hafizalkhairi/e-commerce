<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->


    <link rel="stylesheet" href="aset/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="frontend/styles/main.css">

    <link rel="icon" type="image/png" sizes="16x16" href="aset/gambar/koo_bulat.png">

    <!-- wa-float -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- end -->

    <title>KoooTech</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');



    .produk-container {
        position: relative;

    }

    .gambar-produk {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .5s ease;
        background: rgb(2, 0, 36);
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(33, 53, 85, 0.7511379551820728) 0%);
    }

    .produk-container:hover .overlay {
        opacity: 1;
    }

    .text-produk {
        color: white;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .whats-float {
        position: fixed;
        transform: translate(108px, 0px);
        top: 25%;
        right: 0;
        width: 150px;
        overflow: hidden;
        background-color: #25d366;
        color: #FFF;
        border-radius: 4px 0 0 4px;
        z-index: 10;
        transition: all 0.5s ease-in-out;
        vertical-align: middle
    }

    .whats-float a span {
        color: white;
        font-size: 15px;
        padding-top: 8px;
        padding-bottom: 10px;
        position: absolute;
        line-height: 16px;
        font-weight: bolder;
    }

    .whats-float i {
        font-size: 30px;
        color: white;
        line-height: 30px;
        padding: 10px;
        transform: rotate(0deg);
        transition: all 0.5s ease-in-out;
        text-align: center;

    }

    .whats-float:hover {
        color: #FFFFFF;
        transform: translate(0px, 0px);
    }

    .whats-float:hover i {
        transform: rotate(360deg);
    }

    a,
    a:hover,
    a:visited,
    a:active {
        color: inherit;
        text-decoration: none;
    }

    .site-footer {
        background-color: #213555;
        padding: 45px 0 20px;
        font-size: 15px;
        line-height: 24px;
        color: #737373;
    }

    .site-footer hr {
        border-top-color: #fff;
        opacity: 0.5
    }

    .site-footer hr.small {
        margin: 20px 0
    }

    .site-footer h6 {
        font-weight: bold;
        color: #fff;
        font-size: 16px;
        text-transform: uppercase;
        margin-top: 5px;
        letter-spacing: 2px
    }

    .site-footer a {
        color: #fff;
    }

    .site-footer a:hover {
        color: grey;
        text-decoration: none;
    }

    .footer-links {
        padding-left: 0;
        list-style: none
    }

    .footer-links li {
        display: block
    }

    .footer-links a {
        color: #fff
    }

    .footer-links a:active,
    .footer-links a:focus,
    .footer-links a:hover {
        color: grey;
        text-decoration: none;
    }

    .footer-links.inline li {
        display: inline-block
    }

    .site-footer .social-icons {
        text-align: right
    }

    .site-footer .social-icons a {
        width: 40px;
        height: 40px;
        line-height: 40px;
        margin-left: 6px;
        margin-right: 0;
        border-radius: 100%;
        background-color: #fff
    }

    .copyright-text {
        margin: 0
    }

    @media (max-width:991px) {
        .site-footer [class^=col-] {
            margin-bottom: 30px
        }
    }

    @media (max-width:767px) {
        .site-footer {
            padding-bottom: 0
        }

        .site-footer .copyright-text,
        .site-footer .social-icons {
            text-align: center
        }
    }

    .social-icons {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none
    }

    .social-icons li {
        display: inline-block;
        margin-bottom: 4px
    }

    .social-icons li.title {
        margin-right: 15px;
        text-transform: uppercase;
        color: #96a2b2;
        font-weight: 700;
        font-size: 13px
    }

    .social-icons a {
        background-color: #eceeef;
        color: #818a91;
        font-size: 16px;
        display: inline-block;
        line-height: 44px;
        width: 44px;
        height: 44px;
        text-align: center;
        margin-right: 8px;
        border-radius: 100%;
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear
    }

    .social-icons a:active,
    .social-icons a:focus,
    .social-icons a:hover {
        color: #fff;
        background-color: #29aafe
    }

    .social-icons.size-sm a {
        line-height: 34px;
        height: 34px;
        width: 34px;
        font-size: 14px
    }

    .social-icons a.facebook:hover {
        background-color: #3b5998
    }

    .social-icons a.twitter:hover {
        background-color: #00aced
    }

    .social-icons a.linkedin:hover {
        background-color: #25D366
    }

    .social-icons a.dribbble:hover {
        background-color: #ea4c89
    }

    @media (max-width:767px) {
        .social-icons li.title {
            display: block;
            margin-right: 0;
            font-weight: 600
        }
    }

    .cek {
        border-style: solid;
        border-width: 1px;
    }

    .fixed-top {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1030;
    }

    body {
        background-color: #F0F0F0;
        font-family: 'Poppins', sans-serif;
    }

    .btn-biru {
        color: #fff;
        background-color: #213555;

    }

    .btn-biru:hover {
        color: #fff;
        background-color: #4F709C;

    }

    .btn-biru:focus,
    .btn-biru.focus {
        box-shadow: 0 0 0 0.2rem rgba(92, 104, 62, 0.5);
    }

    .btn-biru.disabled,
    .btn-biru:disabled {
        color: #fff;
        background-color: #768661;
        border-color: #768661;
    }

    .btn-biru:not(:disabled):not(.disabled):active,
    .btn-biru:not(:disabled):not(.disabled).active,
    .show>.btn-biru.dropdown-toggle {
        color: #fff;
        background-color: #213555;
        border-color: #213555;
    }

    .btn-biru:not(:disabled):not(.disabled):active:focus,
    .btn-biru:not(:disabled):not(.disabled).active:focus,
    .show>.btn-biru.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(96, 105, 54, 0.5);
    }

    .grid-container {
        display: grid;
        height: 200px;
        align-content: center;
        grid-template-columns: auto auto auto;
        gap: 10px;
        background-color: #2196F3;
        padding: 10px;
    }

    .grid-container>div {
        background-color: rgba(255, 255, 255, 0.8);
        text-align: center;
        padding: 20px 0;
        font-size: 30px;
    }
</style>

<body>

    <!-- wa-float -->
    <div class="whats-float">
        <a href="https://web.whatsapp.com/send?phone=6283185168719" target="_blank">
            <i class="fa fa-whatsapp"></i><span>WhatsApp<br><small>+6283185168719</small></span>
        </a>
    </div>
    <!-- end -->

    <!---Navbar-->
    <section class="atas pb-5">
        <div class="container pb-5">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color:#F0F0F0 ;">
                <div class="container-fluid ">
                    <a href="./" class="" title="home">
                        <img class="ml-5" src="aset/gambar/koo_tech.png" style="width: 50px; " alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse  navbar-collapse" style="margin-left: 120px;" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <a class="nav-link" href="./">Home</a>
                            <a class="nav-link" href="?page=produk">Produk</a>
                            <a class="nav-link" href="?page=about">About</a>

                        </div>
                        <div class="navbar-nav ml-auto mr-5">
                            <?php
                            if (!isset($_SESSION["log"])) {
                                echo '
                            <li class="nav-item">
                              <a href="?page=register" class="nav-link">Daftar</a>
                            </li>
                            <li class="nav-item">
                              <a
                                href="?page=login"
                                class="btn btn-biru  nav-link px-4 text-white"
                                >Login</a
                              >
                            </li>';
                            } else {

                                if ($_SESSION['role'] == 'User') {
                                    echo '
                            <li class="nav-item dropdown mt-1">
                                <a class="nav-link font-weight-bold " href="#" 
                                  id="navbarDarkDropdownMenuLink" role="button" 
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                Halo, ' . $_SESSION["name"] . ' </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                  <li><a class="dropdown-item" href="customer/index.php">Dashboard</a></li>
                                  <li><a class="dropdown-item" href="logout.php">Keluar</a></li>
                                </ul>
                            </li>
                            <a href="?page=cart" class="nav-link" style="color:red; ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                             </svg> </a>
                            </li>

                            ';
                                } else {
                                    print "<script>
                                    window.location.href ='admin/index.php';
                                </script>";
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <!--Akhir Navbar-->