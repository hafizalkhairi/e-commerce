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
                        <h4 class="card-title">Data Transaksi Anda</h4>
                    </div>
                    <div class="card-body">
                        <table id="example" class="display" style="min-width: 845px; text-align:center;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="width:50px;">Kode Transaksi</th>
                                    <th>Total</th>
                                    <th>Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;

                                $query = mysqli_query($conn, "SELECT * FROM transaksi JOIN rekening ON  transaksi.id_rekening=rekening.id_rekening WHERE transaksi.id_users='$_SESSION[id]' ORDER BY code ASC");
                                ?>
                                <?php foreach ($query as $query) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $query['code'] ?></td>
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
                                                <?php if ($query["status_transaksi"] == "BELUM KONFIRMASI" && $query["foto_bukti"] == '') : ?>
                                                    <a class="dropdown-item" href="?page=transaksi/transfer&id=<?= $query["id_transaksi"]; ?>">Transfer</a>
                                                <?php elseif ($query["status_transaksi"] == "TERKIRIM") : ?>
                                                    <a class="dropdown-item" href="?page=transaksi/terima&id=<?= $query["id_transaksi"]; ?>">Terima Barang</a>
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