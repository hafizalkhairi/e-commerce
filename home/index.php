<!---Page Content-->
<section class="">

  <div class="container">

    <div class="row align-items-center justify-content-between">
      <div class="col-md-6 ">
        <center><img src="aset/gambar/koo_tech.png" class="text-center " style="width: 500px; border-radius:50%;" alt="" /></center>
      </div>
      <div class="col-md-6 ">
        <b style="font-size: 55px; font-weight: bold; margin-bottom: 15px; color:#213555;">KoooTech</b>
        <p style="line-height: 28px; color: rgb(146, 146, 146); text-align:justify;">
          KoooTech adalah tujuan yang tepat untuk semua kebutuhan teknologi Anda. Toko ini menyediakan pengalaman berbelanja yang menarik untuk pelanggan yang mencari perangkat komputer dan segala perlengkapan pendukungnya. KooTech berkomitmen untuk memberikan layanan terbaik dan produk berkualitas tinggi kepada pelanggannya.
        </p>

        <a href="?page=produk" class="btn btn-biru px-4 py-2 mt-4 shadow-lg text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bag-dash-fill" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6 9.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6z" />
          </svg> Pesan Sekarang</a>
      </div>
    </div>
  </div>

</section>
<section class="" style="margin-top: 50px;">
  <div class="container p-3 ">
    <div class="row">
      <div class="col-12 text-center mb-3 mt-5">
        <h4 style="font-weight: 600;">Kelebihan Toko Kami</h4>
        <hr style="border-top: 5px solid black; width: 100px;">
      </div>
    </div>
    <div class="row">
      <div class="col-6 col-md-4">
        <div class="card mb-4">
          <div class="card-body shadow-lg">
            <div class="row justify-content-center align-content-center">
              <div class="col-10 col-md-4">
                <div class="mb-lg-0 mb-2">
                  <img src="aset/gambar/best-seller.png" class="w-100" alt="" />
                </div>
              </div>
              <div class="col-md-8">
                <div class="text-center text-lg-left">Memberikan barang dengan kualitas terbaik.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="card mb-4">
          <div class="card-body shadow-lg">
            <div class="row justify-content-center align-content-center">
              <div class="col-10 col-md-4">
                <div class="mb-lg-0 mb-2">
                  <img src="aset/gambar/payment.png" class="w-100" alt="" />
                </div>
              </div>
              <div class="col-md-8">
                <div class="text-center text-lg-left">Harga bersahabat, sehingga ramah dikantong.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="card mb-4">
          <div class="card-body shadow-lg">
            <div class="row justify-content-center align-content-center">
              <div class="col-10 col-md-4">
                <div class="mb-lg-0 mb-2">
                  <img src="aset/gambar/shopping.png" class="w-100" alt="" />
                </div>
              </div>
              <div class="col-md-8">
                <div class="adventege-description text-center text-lg-left">Memberikan pelayanan terbaik kepada pelanggan.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="container ">
  <div class="container pt-5 mt-5 ">
    <div class="row">
      <div class="col-12 text-center mb-3 mt-5">
        <h4 style="font-weight: 600;">Produk Terbaru</h4>
        <hr style="border-top: 5px solid black; width: 100px;">
      </div>
    </div>
    <div class="row container align-item-center ">
      <!-- Card produk -->

      <?php

      $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 8");
      foreach ($query as $data) {
      ?>
        <div class="col-6  col-md-3">
          <div class="card mb-4 shadow-lg">

            <div class="produk-container">
              <a href="?page=detail&id=<?= $data['id_produk'] ?>"><img class="card-img-top" src="admin/produk/images/<?= $data['foto_produk'] ?>" alt="Card image cap"></a>
              <div class="overlay"></div>
            </div>

            <div class="card-body shadow-lg" style="height: 225px;;">
              <div class="row align-content-center">
                <div class="text-center p-1 p-1" style="height: 150px; width:100%;">
                  <p class="card-title text-center mb-4"><a style="font-size: 15px;  font-weight: bold;" class="" href="?page=detail&id=<?= $data['id_produk'] ?>"><?= $data['nama_produk'] ?></a></p>
                </div>

                <div class="card-footer text-center" style="width: 100%;">
                  <a href="?page=detail&id=<?= $data['id_produk'] ?>" class="text-danger">Rp. <?= number_format($data["harga"]); ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>



    </div>
  </div>
</section>

<!---Akhir Page Content-->