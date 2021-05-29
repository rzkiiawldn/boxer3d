<main id="main" data-aos="zoom-out">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2><?= $judul; ?></h2>
                <ol>
                    <li><a href="<?= base_url('user/dashboard') ?>">Home</a></li>
                    <li><a href="<?= base_url('user/return_barang') ?>">Riwayat Return</a></li>
                    <li><?= $judul; ?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->


    <section class="inner-page">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <?= $judul; ?>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th width="30%">Nama</th>
                                    <td width="70%">: <?= $return->nama ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Nomor Telepon</th>
                                    <td width="70%">: <?= $return->no_tlp ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Alamat Pengembalian</th>
                                    <td width="70%">: <?= $return->alamat_pengembalian ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Tanggal return</th>
                                    <td width="70%">: <?= $return->tanggal_return ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Alasan return</th>
                                    <td width="70%">: <?= $return->alasan_return ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Status return</th>
                                    <td width="70%">: <?= $return->status_return ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Video Bukti</th>
                                    <td width="70%">: 
                                    	<video src="<?= base_url('assets/return_barang/'. $return->video); ?>" controls></video>
                                    </td>
                                </tr>
                                <?php if($return->status_return == 'terima') { ?>
                                <tr>
                                    <th width="30%">Nama Bank & Rekening</th>
                                    <td width="70%">: <?= $return->nama_bank ?>, <?= $return->rekening; ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Foto Resi</th>
                                    <td width="70%">: <img src="<?= base_url('assets/foto_resi/'. $return->foto_resi); ?>" width="200px"></td>
                                </tr>
                            <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <p style="height: 180px;"></p>

</main><!-- End #main -->