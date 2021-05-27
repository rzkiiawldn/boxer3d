<main id="main" data-aos="zoom-out">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2><?= $judul; ?></h2>
                <ol>
                    <li><a href="<?= base_url('user/dashboard') ?>">Home</a></li>
                    <li><a href="<?= base_url('user/berita') ?>">Berita</a></li>
                    <li><?= $judul; ?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container">
            <div class="section-title" data-aos="zoom-out">
                <h2><?= $judul; ?></h2>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?= base_url('assets/berita/' . $berita->foto_berita) ?>" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ml-2">
                    <h2><b><?= $berita->judul_berita; ?></b></h2>
                    <div style="color: chocolate;" class="mb-3">
                        
                    </div>
                    <p style="font-size: 15px;"><?= nl2br($berita->isi_berita); ?></p>
                </div>
            </div>
        </div>
    </section>
    <p style="height: 100px;"></p>

</main><!-- End #main -->