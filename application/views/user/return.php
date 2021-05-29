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
            <div class="title pb-5">
              <h2>Syarat Return Barang</h2>
              <ol class="font-weight-light">
                <?php foreach($syarat as $s){ ?>
                <li><?= $s->syarat; ?></li>
                <?php } ?>
              </ol>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="<?= base_url('user/return_barang/ajukan'); ?>" class="btn btn-primary mb-3 float-right">Ajukan Return</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Return</th>
                            <th>Status Return</th>
                            <th>Alasan</th>
                            <th>Bukti Video</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($return_barang as $return) : ?>
                        <tr>
                            <td>1</td>
                            <td><?= $return->tanggal_return; ?></td>
                            <td>
                                <?php if($return->status_return == 'proses') { ?>
                                    <span class="badge badge-warning">sedang diproses</span>
                                <?php } elseif($return->status_return == 'tolak') { ?>
                                    <span class="badge badge-danger">pengajuan ditolak</span>
                                <?php } else { ?>
                                    <span class="badge badge-success">pengajuan diterima</span>
                                <?php } ?>
                            </td>
                            <td><?= $return->alasan_return; ?></td>
                            <td>
                                <video width="220" height="120" controls src="<?= base_url('assets/return_barang/'.$return->video); ?>"></video>
                            </td>
                            <td>
                                <?php if($return->status_return == 'terima' && $return->foto_resi == '') { ?>
                                    <a href="<?= base_url('user/return_barang/detail_return/'.$return->id_return); ?>" class="btn btn-sm btn-info">Detail</a>
                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadResi<?= $return->id_return ?>">upload Resi</a>
                                <?php } elseif($return->foto_resi != '' && $return->status_return == 'terima') { ?>
                                    <a href="<?= base_url('user/return_barang/detail_return/'.$return->id_return); ?>" class="btn btn-sm btn-info">Detail</a>
                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#lihatResi<?= $return->id_return ?>">Lihat Resi</a>
                                <?php } else { ?>
                                    <a href="<?= base_url('user/return_barang/detail_return/'.$return->id_return); ?>" class="btn btn-sm btn-info">Detail</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <p style="height: 200px;"></p>

</main>


<!-- Modal -->
<?php foreach ($return_barang as $return) { ?>
    <div class="modal fade" id="uploadResi<?= $return->id_return ?>" tabindex="-1" role="dialog" aria-labelledby="uploadResiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadResiLabel">Upload Resi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/return_barang/upload_resi/' . $return->id_return) ?>" method="post" enctype="multipart/form-data">
                    <div class=" modal-body">
                        <div class="form-group">
                            <label for="nama_bank">Nama Bank</label>
                            <input type="text" class="form-control" required name="nama_bank" id="nama_bank">
                        </div>
                        <div class="form-group">
                            <label for="rekening">Rekening</label>
                            <input type="number" class="form-control" required name="rekening" id="rekening">
                        </div>
                        <div class="form-group">
                            <label for="alamat_pengembalian">Alamat Pengembalian</label>
                            <textarea name="alamat_pengembalian" class="form-control" required="" id="alamat_pengembalian"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto_resi">Upload Resi</label>
                            <input type="hidden" name="id_return" value="<?= $return->id_return ?>">
                            <input type="file" class="form-control" required name="foto_resi" id="foto_resi">
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

<!-- LIHAT Resi -->
<?php foreach ($return_barang as $return) { ?>
    <div class="modal fade" id="lihatResi<?= $return->id_return ?>" tabindex="-1" role="dialog" aria-labelledby="lihatResiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatResiLabel">Resi Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/return_barang/upload_resi/' . $return->id_return) ?>" method="post" enctype="multipart/form-data">
                    <div class=" modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <input type="text" name="" class="form-control" readonly value="<?= $return->nama_bank; ?>">
                                </div>                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rekening</label>
                                    <input type="text" name="" class="form-control" readonly value="<?= $return->rekening; ?>">
                                </div>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Pengembalian</label>
                                    <input type="text" name="" class="form-control" readonly value="<?= $return->alamat_pengembalian; ?>">
                                </div>                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <img src="<?= base_url('assets/foto_resi/' . $return->foto_resi) ?>" class="img" alt="" height="200px">
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>                
        </div>
    </div>
    </div>
    </div>
<?php } ?>