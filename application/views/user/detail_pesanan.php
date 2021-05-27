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

    <section class="inner-page" data-aos="zoom-out">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
            	<table class="table">
            		<tr>
            			<th width="20%">Nama Pembeli</th>
            			<td>: <?= $user['nama']; ?></td>
            		</tr>
            		<tr>
            			<th width="20%">No Telepon</th>
            			<td>: <?= $pesanan->no_tlp_pesanan; ?></td>
            		</tr>
            		<tr>
            			<th width="20%">Alamat Pengiriman</th>
            			<td>: <?= $pesanan->alamat_pesanan; ?></td>
            		</tr>
            		<tr>
            			<th width="20%">Kecamatan</th>
            			<td>: <?= $pesanan->kecamatan_pesanan; ?></td>
            		</tr>
            		<tr>
            			<th width="20%">Kode Pos</th>
            			<td>: <?= $pesanan->kode_pos_pesanan; ?></td>
            		</tr>
            		<tr>
            			<th width="20%">Status Pembayaran</th>
            			<td>: 
            				<?php if ($pesanan->bukti_pembayaran == '') { ?>
	                            Belum melakukan pembayaran | <a href="" class="badge badge-warning" data-toggle="modal" data-target="#uploadBukti<?= $pesanan->id_pesanan ?>">Upload bukti pembayaran</a>
	                        <?php } else { ?>
	                            Pembayaran sudah dilakukan | <a href="" class="badge badge-success" data-toggle="modal" data-target="#lihatBukti<?= $pesanan->id_pesanan ?>">Lihat bukti pembayaran</a>
	                        <?php } ?>
            			</td>
            		</tr>
            	</table><br>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Pesanan</th>
                                <th scope="col">Harga / pcs</th>
                                <th scope="col">Jumlah Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pesanan_detail as $row) { ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><img src="<?= base_url('assets/barang/'.$row->foto_barang); ?>" width="100px"></td>
                                    <td><?= $row->nama_motif; ?></td>
                                    <td><?= $row->jumlah_barang; ?> Brg</td>
                                    <?php if($row->jumlah_barang >= 20) { ?>
                                    <td>Rp. <s><?= number_format($row->harga_barang); ?></s> <?= number_format(18500); ?></td>
                                    <?php } else { ?>
                                    <td>Rp. <?= number_format($row->harga_barang); ?></td>
                                    <?php } ?>
                                    <td>Rp. <?= number_format($row->jumlah_harga); ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="5" align="right"><strong> Total :</strong></td>
                                <td>Rp. <?= number_format($pesanan->total_harga); ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong> Kode Unik Pembayaran :</strong></td>
                                <td>Rp. <?= number_format($pesanan->kode_bayar); ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong> Total Yang Harus Dibayar :</strong></td>
                                <td>Rp. <?= number_format($pesanan->total_harga + $pesanan->kode_bayar); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>
    <p style="height: 200px;"></p>

</main>


<?php foreach ($data_pesanan as $row) { ?>
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
    <div class="modal fade" id="lihatBukti<?= $pesanan->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="lihatBuktiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatBuktiLabel">Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/pesanan/upload_bukti/' . $pesanan->id_pesanan) ?>" method="post" enctype="multipart/form-data">
                    <div class=" modal-body">
                        <div class="form-group">
                            <img src="<?= base_url('assets/bukti_pembayaran/' . $pesanan->bukti_pembayaran) ?>" class="img img-fluid" alt="">
                        </div>
                        <?php if ($pesanan->status != 1) { ?>
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
                                <input type="hidden" name="id_pesanan" value="<?= $pesanan->id_pesanan ?>">
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