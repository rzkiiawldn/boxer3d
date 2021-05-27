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

    <form action="<?= base_url('user/pengajuan/ajukan'); ?>" method="post" enctype="multipart/form-data">
    <section class="inner-page" data-aos="zoom-out">
        <div class="container">
        <div class="title pb-5">
          <h2>Syarat Menjadi Reseller</h2>
          <ol class="font-weight-light">
            <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
            <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
            <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
            <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
            <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
            <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
          </ol>
        </div>
          <div class="form-row justify-content-center">
            <?php if(!empty($pengajuan->user_id)) { ?>
              <div class="col-md-12">
                <div class="alert alert-primary" role="alert">
                  Proses pengajuan menjadi <strong>reseller</strong> di <?= $pengajuan->status_pengajuan; ?>
                </div>
              </div>
            <?php } else { ?>
            <div class="form-group col-md-6">
              <label for="upload">Upload Bukti</label>
              <input type="file" name="foto_bukti" class="form-control"><br>
               <?= form_error('foto_bukti', '<small class="text-danger pl-3">', '</small>'); ?>
              <button type="submit" class="btn btn-primary float-right">Ajukan</button>
            </div>
          <?php } ?>
          </div>
        </div>
    </section>
    </form>
    <p style="height: 200px;"></p>

</main>