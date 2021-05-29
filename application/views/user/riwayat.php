<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center" data-aos="zoom-out">
                <h2><?= $judul; ?></h2>
                <ol>
                    <li><a href="<?= base_url('user/dashboard') ?>">Home</a></li>
                    <li><?= $judul; ?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

<?php if($user['dropship'] == 1) { ?>
    <section class="inner-page" data-aos="zoom-out">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <h3>Dropshipper</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Pesanan</th>
                                <th>Status Pesanan</th>
                                <th>Total Harga</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pesanan as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->tanggal_pesanan; ?></td>
                                    <td>
                                        <?php if($row->status == 1) {
                                            echo 'Sudah dipesan & belum bayar';
                                        } elseif ($row->status == 2) {
                                            echo 'Sudah bayar';
                                        } else {
                                            echo "transaksi selesai";
                                        } ?>
                                    </td>
                                    <td>Rp. <?= number_format($row->total_harga + $row->kode_bayar); ?></td>
                                    <td>
                                        <?php if($row->bukti_pembayaran == '') { ?>
                                            <a href="<?= base_url('user/pesanan/detail_pesanan/' . $row->id_pesanan) ?>" class="btn btn-sm btn-info">Detail</a>
                                            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadBukti<?= $row->id_pesanan ?>">upload bukti</a>
                                        <?php } else { ?>
                                             <a href="<?= base_url('user/pesanan/detail_pesanan/' . $row->id_pesanan) ?>" class="btn btn-sm btn-info">Detail</a>
                                            <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#lihatBukti<?= $row->id_pesanan ?>">Lihat Bukti</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>
    <?php } elseif($user['reseller'] == 1) { ?>
    <section class="inner-page" data-aos="zoom-out">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <h3>Reseller</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Pesanan</th>
                                <th>Status Pesanan</th>
                                <th>Total Harga</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pesanan as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->tanggal_pesanan; ?></td>
                                    <td>
                                        <?php if($row->status == 1) {
                                            echo 'Sudah dipesan & belum bayar';
                                        } elseif ($row->status == 2) {
                                            echo 'Sudah bayar';
                                        } else {
                                            echo "transaksi selesai";
                                        } ?>
                                    </td>
                                    <td>Rp. <?= number_format($row->total_harga + $row->kode_bayar); ?></td>
                                    <td>
                                        <?php if($row->bukti_pembayaran == '') { ?>
                                            <a href="<?= base_url('user/pesanan/detail_pesanan/' . $row->id_pesanan) ?>" class="btn btn-sm btn-info">Detail</a>
                                            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadBukti<?= $row->id_pesanan ?>">upload bukti</a>
                                        <?php } else { ?>
                                             <a href="<?= base_url('user/pesanan/detail_pesanan/' . $row->id_pesanan) ?>" class="btn btn-sm btn-info">Detail</a>
                                            <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#lihatBukti<?= $row->id_pesanan ?>">Lihat Bukti</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>
    <?php } else { ?>
    <section class="inner-page" data-aos="zoom-out">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Pesanan</th>
                                <th>Status Pesanan</th>
                                <th>Total Harga</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pesanan as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->tanggal_pesanan; ?></td>
                                    <td>
                                        <?php if($row->status == 1) {
                                            echo 'Sudah dipesan & belum bayar';
                                        } elseif ($row->status == 2) {
                                            echo 'Sudah bayar';
                                        } else {
                                            echo "transaksi selesai";
                                        } ?>
                                    </td>
                                    <td>Rp. <?= number_format($row->total_harga + $row->kode_bayar); ?></td>
                                    <td>
                                        <?php if($row->bukti_pembayaran == '') { ?>
                                            <a href="<?= base_url('user/pesanan/detail_pesanan/' . $row->id_pesanan) ?>" class="btn btn-sm btn-info">Detail</a>
                                            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadBukti<?= $row->id_pesanan ?>">upload bukti</a>
                                        <?php } else { ?>
                                             <a href="<?= base_url('user/pesanan/detail_pesanan/' . $row->id_pesanan) ?>" class="btn btn-sm btn-info">Detail</a>
                                            <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#lihatBukti<?= $row->id_pesanan ?>">Lihat Bukti</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>
    <?php } ?>
    <p style="height: 300px;"></p>
</main>




<!-- Modal -->
<?php foreach ($pesanan as $row) { ?>
    <div class="modal fade" id="uploadBukti<?= $row->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="uploadBuktiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadBuktiLabel">Upload Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/pesanan/upload_bukti/' . $row->id_pesanan) ?>" method="post" enctype="multipart/form-data">
                    <div class=" modal-body">
                        <div class="form-group">
                            <label for="bukti_pembayaran">Upload Bukti</label>
                            <input type="hidden" name="id_pesanan" value="<?= $row->id_pesanan ?>">
                            <input type="file" class="form-control" required name="bukti_pembayaran" id="bukti_pembayaran">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="upload">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!-- LIHAT BUKTI -->
<?php foreach ($pesanan as $row) { ?>
    <div class="modal fade" id="lihatBukti<?= $row->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="lihatBuktiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatBuktiLabel">Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/pesanan/upload_bukti/' . $row->id_pesanan) ?>" method="post" enctype="multipart/form-data">
                    <div class=" modal-body">
                        <div class="form-group">
                            <img src="<?= base_url('assets/bukti_pembayaran/' . $row->bukti_pembayaran) ?>" class="img img-fluid" alt="">
                        </div>
                        <?php if ($row->status != 2) { ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                <?php } else { ?>
                    <p>
                        <button class="btn btn-success btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Edit bukti pembarayan
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="form-group">
                                <label for="bukti_pembayaran">Edit Bukti Pembayaran</label>
                                <input type="hidden" name="id_pesanan" value="<?= $row->id_pesanan ?>">
                                <input type="file" class="form-control" required name="bukti_pembayaran" id="bukti_pembayaran">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="edit">Edit</button>
            </div>
            </form>
        <?php } ?>
        </div>
    </div>
    </div>
    </div>
<?php } ?>