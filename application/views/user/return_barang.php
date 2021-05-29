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
          <?= form_open_multipart() ?>
          <div class="form-row justify-content-center">
            <div class="form-group col-md-12">
                <label>Alasan Return</label>
                <textarea name="alasan_return" class="form-control" rows="10"></textarea>
            </div>
            <div class="form-group col-md-12">
              <label for="upload">Upload Bukti (berupa video)</label>
                <input type="file" class="form-control" name="video" required="">
               <?= form_error('video', '<small class="text-danger pl-3">', '</small>'); ?><br>
              <button type="submit" class="btn btn-primary float-right">Ajukan</button>
            </div>

          </div>
          <?= form_close(); ?>
        </div>
    </section>
    <p style="height: 200px;"></p>

</main>