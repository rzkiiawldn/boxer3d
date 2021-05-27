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
            <ul class="list-unstyled">
          <?php foreach($berita as $b) : ?>
          <li class="media">
            <img src="<?= base_url('assets/berita/'. $b->foto_berita); ?>" class="mr-3" alt="..." height="100px">
            <div class="media-body">
              <h5 class="mt-0 mb-1"><strong> <?= $b->judul_berita; ?></strong></h5>
              <p style="font-size: 12px"><?= $b->tanggal_input; ?></p>
              <p><?= $b->isi_berita; ?>.</p>
              <a href="<?= base_url('user/berita/detail/'.$b->id_berita); ?>" class="btn btn-sm btn-primary mt-5">selengkapnya</a>
            </div>
          </li><br><hr><br>
          <?php endforeach; ?>
        </ul>
        </div>
    </section>
    <p style="height: 200px;"></p>

</main><!-- End #main -->