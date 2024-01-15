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
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <table id="example" class="display" style="min-width: 845px; text-align:center;">
                            <thead>
                                <tr>
                                    <th style="width:5%; ">No</th>
                                    <th style="width:15%;">Kode Transaksi</th>
                                    <th>Nama</th>
                                    <th>Total</th>
                                    <th style="width:5%; ">Pembayaran</th>
                                    <th style="width:20%; ">Status Pembayaran</th>
                                    <th style="width:10%; ">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;

                                $query = mysqli_query($conn, "SELECT * FROM transaksi JOIN rekening ON  transaksi.id_rekening=rekening.id_rekening JOIN users ON transaksi.id_users=users.id_users WHERE transaksi.status_transaksi = 'TERKIRIM' ORDER BY code ASC");
                                ?>
                                <?php foreach ($query as $query) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $query['code'] ?></td>
                                        <td><?= $query['name'] ?></td>
                                        <td>Rp. <?= number_format($query['total_transaksi']) ?></td>
                                        <td><?= $query['nama_bank'] ?></td>
                                        <td>
                                            <?php if ($query['status_transaksi'] == 'BELUM KONFIRMASI') : ?>
                                                <span class="badge badge-pill badge-danger"><?= $query['status_transaksi'] ?></span>
                                            <?php elseif ($query['status_transaksi'] == 'TERKONFIRMASI') : ?>
                                                <span class="badge badge-pill badge-warning"><?= $query['status_transaksi'] ?></span>
                                            <?php elseif ($query['status_transaksi'] == 'TERKIRIM') : ?>
                                                <span class="badge badge-pill badge-info"><?= $query['status_transaksi'] ?></span>
                                            <?php else : ?>
                                                <span class="badge badge-pill badge-success"><?= $query["status_transaksi"]; ?></span>
                                        </td>
                                    <?php endif; ?>

                                    <td style="width: 17%; text-align: center;">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="?page=transaksi/detail-transaksi&id=<?= $query["id_transaksi"]; ?>">Lihat</a>
                                                <a class="dropdown-item" href="?page=transaksi/hapus_transaksi&id=<?= $query["id_transaksi"]; ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')">Hapus</a>

                                                <?php if ($query["status_transaksi"] == "TERKONFIRMASI") : ?>
                                                    <a class="dropdown-item" href="?page=transaksi/kirim&id=<?= $query["id_transaksi"]; ?>">Kirim Barang</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->