<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">Selamat Datang</h2>
                <p class="animate__animated fanimate__adeInUp">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates dicta placeat repellat..</p>
            </div>
        </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
    </svg>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="zoom-out">
                <h2>About</h2>
                <p>About Us</p>
            </div>

            <div class="row content" data-aos="fade-up">
                <?php foreach ($about as $data) { ?>
                    <div class="col-md-7">
                        <p><?= nl2br($data->about); ?></p>
                    </div>
                    <div class="col-md-5">
                        <p>Alamat : <?= $data->alamat; ?></p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3560484560307!2d106.69371501476903!3d-6.216689195499747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9ff7714ffd1%3A0xf38f3824157c2aec!2sDaster%20Sambung%203D!5e0!3m2!1sid!2sid!4v1622170659088!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section><!-- End About Section -->

    <section id="team" class="team">
        <div class="container">
            <div class="section-title" data-aos="zoom-out">
                <h2>Data Barang</h2>
            </div>
            <?php if (empty($barang)) { ?>
                <p style="height: 250px;" class="text-center text-black-50">barang kosong</p>
            <?php } else { ?>
                <div class="row" data-aos="zoom-out">
                    <?php foreach ($barang as $brg) { ?>
                        <div class="col-md-4 d-flex justify-content-center mb-3">
                            <div class="card" style="width: 18rem;">
                                <img src="<?= base_url('assets/barang/' . $brg->foto_barang); ?>" class="card-img-top" alt="..." style="height: 15rem">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $brg->nama_motif; ?></h5>
                                    <p class="card-text" style="font-size: 16px;color:chocolate"><b>Rp. <?= number_format($brg->harga_barang, 0, ',', '.'); ?></b></p>
                                    <p class="card-text" style="font-size: 14px;"><?= $brg->stok_barang; ?> Pcs</p>
                                    <a href="<?= base_url('user/barang/index/' . $brg->id_barang) ?>" class="btn btn-sm text-white float-right" style="background-color: #2a2c39;">Pesan</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
</main>
<p style="height: 100px;"></p>