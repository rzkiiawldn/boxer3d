<main id="main" data-aos="zoom-out">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2><?= $judul; ?></h2>
                <ol>
                    <li><a href="<?= base_url('user/dashboard') ?>">Home</a></li>
                    <li><?= $judul; ?></li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="team" class="team">
        <div class="container">
            <div class="section-title" data-aos="zoom-out">
                <h2><?= $judul; ?></h2>
            </div>
            <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">
                <?= $this->session->flashdata('pesan'); ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Email</label>
                        <input style="font-size: 14px;" type="email" class="form-control" name="email" value="<?= $user['email'] ?>" readonly />
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Nama Lengkap</label>
                        <input style="font-size: 14px;" type="text" class="form-control" name="nama" value="<?= $user['nama'] ?>" />
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Nomor Telepon</label>
                        <input style="font-size: 14px;" type="number" class="form-control" name="no_tlp" value="<?= $user['no_tlp'] ?>" />
                        <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Alamat Lengkap</label>
                        <textarea style="font-size: 14px;" rea name="alamat" id="alamat" cols="20" rows="6" required class="form-control"><?= $user['alamat']; ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Kecamatan</label>
                                <input style="font-size: 14px;" type="text" class="form-control" name="kecamatan" value="<?= $user['kecamatan'] ?>" />
                                <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Kode Pos</label>
                                <input style="font-size: 14px;" type="text" class="form-control" name="kode_pos" value="<?= $user['kode_pos'] ?>" />
                                <?= form_error('kode_pos', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <hr><p style="font-size:12px;color: red;">kosongkan jika tidak diganti</p>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Password Baru</label>
                        <input style="font-size: 14px;" type="password" class="form-control" name="password" />
                    </div>
                    <button type="submit" class="btn text-white float-right" style="background-color: #2a2c39;">Edit</button>
                </form>

            </div>
        </div>
    </section>
    <p style="height: 120px;"></p>

</main><!-- End #main -->