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
            <div class="row ">
          <?php foreach($event as $e): ?>
          <div class="col-md-4 d-flex justify-content-center">  
          <div class="card" style="width: 18rem;">
            <img src="<?= base_url('assets/event/'.$e->foto_event); ?>" class="card-img-top" alt="..." style="height: 15rem">
            <div class="card-body">
              <p class="card-text">Tanggal Berakhir : <span style="color: red"><?= $e->tanggal_akhir; ?></span></p>
              <p class="card-text"><?= $e->deskripsi_event; ?>.</p>
              <a href="<?= base_url('user/event/detail/'.$e->id_event); ?>" class="btn btn-primary float-right">Selengkapnya</a>
            </div>
          </div>
          </div>
          <?php endforeach; ?>
        </div>
        </div>
    </section>
    <p style="height: 200px;"></p>

</main>