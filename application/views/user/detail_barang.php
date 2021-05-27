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
            <div class="row mt-3">
            <div class="col-md-6">
                <div class="card" style="width: 30rem;height:30rem">
                    <div class="card-body">
                        <img src="<?= base_url('assets/barang/' . $barang->foto_barang) ?>" class="img img-fluid" alt="..." >
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="my-3"><?= $barang->nama_motif ?></h2>
                <form action="<?= base_url('user/barang/pesan/' . $barang->id_barang) ?>" method="post">
                <table class="table">
                    <tr>
                        <td width="30%">Harga</td>
                        <td width="5%">:</td>
                        <td width="65%">Rp. <?= number_format($barang->harga_barang); ?></td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td>:</td>
                        <td><?= $barang->stok_barang ?> Pcs </td>
                    </tr>
                    <tr>
                        <td>Pesan Barang</td>
                            <input type="hidden" name="id_barang" value="<?= $barang->id_barang ?>">
                            <td colspan="2">
                                <!-- <input type="number" class="form-control" name="jumlah_barang" min="1" max="<?= $barang->stok_barang ?>" required/> -->
                                <div class="input-group">
                                  <input type="button" value="-" class="button-minus" data-field="jumlah_barang">
                                  <input type="number" step="1" max="<?= $barang->stok_barang ?>" value="1" name="jumlah_barang" class="quantity-field">
                                  <input type="button" value="+" class="button-plus" data-field="jumlah_barang">
                                </div>
                                <?= form_error('jumlah_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button type="submit" class="btn btn-dark float-right">Pesan</button>
                        </td>
                    </tr>
                </table>
                </form>
            </div>
      </div>
        </div>
    </section>
    <p style="height: 200px;"></p>

</main>