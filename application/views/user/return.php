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
                <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
                <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
                <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
                <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
                <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
                <li>bla bla bla bla bla bla bla bla bla bla bla bla</li>
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
                            <th>Bukti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <p style="height: 200px;"></p>

</main>