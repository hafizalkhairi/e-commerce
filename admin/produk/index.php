 <!--**********************************
            Content body start
        ***********************************-->
 <div class="content-body">
     <div class="container-fluid">
         <div class="row page-titles mx-0">
             <div class="col-sm-6 p-md-0">
                 <div class="welcome-text">
                     <h4>Hi, welcome back!</h4>

                 </div>
             </div>
             <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="./">Home</a></li>
                     <li class="breadcrumb-item active"><a href="?page=produk/index">Produk</a></li>
                 </ol>
             </div>
         </div>
         <!-- row -->


         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">Data produk</h4>
                     </div>
                     <div class="card-body">
                         <div class="container">
                             <a href="?page=produk/tambah_produk" type="button" class="btn cbtn-rounded btn-primary mb-4 mt-2"><span class="btn-icon-left text-primary"><i class="fa fa-plus color-info"></i>
                                 </span>Tambah produk
                             </a>
                         </div>
                         <div class="table-responsive text-center">
                             <table id="example" class="display" style="min-width: 845px">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th style="width: 150px;">Nama Produk</th>
                                         <th>Harga</th>
                                         <th>Kategori</th>
                                         <th>Stock</th>
                                         <th>Gambar Produk</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php

                                        include "koneksi.php";

                                        $no = 1;
                                        $ambildata = mysqli_query($conn, "SELECT * FROM produk 
                                        JOIN kategori ON produk.id_kategori=kategori.id_kategori
                                        ORDER BY id_produk DESC");
                                        while ($data = mysqli_fetch_array($ambildata)) {
                                        ?>
                                         <td><?= $no++ ?></td>
                                         <td><?= $data['nama_produk'] ?></td>
                                         <td><?= $data['harga'] ?></td>
                                         <td><?= $data['nama_kategori'] ?></td>
                                         <td><?= $data['stock'] ?></td>
                                         <td><img src="produk/images/<?= $data['foto_produk'] ?>" alt="gambar" width="150px;">
                                         </td>
                                         <td>
                                             <a class='btn btn-success fa fa-edit mb-2' href='?page=produk/edit_produk&produk=<?= $data['id_produk'] ?>'></a>
                                             <a class='btn btn-danger fa fa-trash mb-2' href='?page=produk/hapus&produk=<?= $data['id_produk'] ?>' onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')"></a>
                                         </td>
                                         </tr>
                                     <?php } ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--**********************************
            Content body end
        ***********************************-->