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
                        <div class="col-md-4 d-flex justify-content-center">
                          <div class="card" style="width: 18rem;">
                            <img src="<?= base_url('assets/barang/'. $brg->foto_barang); ?>" class="card-img-top" alt="..." style="height: 15rem">          
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