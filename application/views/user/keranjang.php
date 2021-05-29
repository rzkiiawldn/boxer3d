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
      <div class="row" data-aos="zoom-out">
        <div class="col">
          <p style="color: red;">NB : Pembelian 20 pcs atau lebih = Rp 18.500</p>
        </div>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <?php if ($user['dropship'] == 1) : ?>
    <section class="inner-page" data-aos="zoom-out">
      <div class="container">
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama Motif</th>
                    <th scope="col">Jumlah Pesanan</th>
                    <th scope="col">Harga / pcs</th>
                    <th scope="col">Jumlah Harga</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pesanan_detail as $row) { ?>
                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><img src="<?= base_url('assets/barang/' . $row->foto_barang); ?>" class="img" width="100"></td>
                      <td><?= $row->nama_motif; ?></td>
                      <td><?= $row->jumlah_barang; ?> Pcs</td>
                      <?php if ($row->jumlah_barang >= 20) { ?>
                        <td>Rp. <?= number_format($row->harga_barang); ?></td>
                      <?php } else { ?>
                        <td>Rp. <?= number_format($row->harga_barang); ?></td>
                      <?php } ?>
                      <td>Rp. <?= number_format($row->jumlah_harga); ?></td>
                      <td>
                        <form action="<?= base_url('user/pesanan/batalkan/' . $row->id_pesanan_detail) ?>" method="post">
                          <input type="hidden" name="id" value="<?= $row->id_pesanan_detail ?>">
                          <button type="submit" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-sm btn-danger" title="hapus">Batal</button>
                        </form>
                      </td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <?php if (empty($pesanan->total_harga)) { ?>
                      <td colspan="7" class="text-center">Pesanan Belum Ada <br><a href="<?= base_url('user/dashboard') ?>" style="font-size: 14px;">Kembali ke home</a></td>
                    <?php } else { ?>
                      <td colspan="5"><strong> Total :</strong></td>
                      <td>Rp. <?= number_format($pesanan->total_harga); ?></td>
                      <td>
                        <!-- <a href="<?= base_url('user/pesanan/konfirmasi') ?>" class="btn btn-sm btn-success" onclick="return confirm('apakah anda yakin ?')">Check-out</a> -->
                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#dropship">Check out</a>
                      </td>
                    <?php } ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php elseif ($user["reseller"] == 1) : ?>
    <section class="inner-page" data-aos="zoom-out">
      <div class="container">
        <div class="row mt-3">
          <div class="col-md-12">
            <h3>Reseller</h3>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama Motif</th>
                    <th scope="col">Jumlah Pesanan</th>
                    <th scope="col">Harga / pcs</th>
                    <th scope="col">Jumlah Harga</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pesanan_detail as $row) { ?>
                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><img src="<?= base_url('assets/barang/' . $row->foto_barang); ?>" class="img" width="100">></td>
                      <td><?= $row->nama_motif; ?></td>
                      <td><?= $row->jumlah_barang; ?> Pcs</td>
                      <?php if ($row->jumlah_barang >= 20) { ?>
                        <td>Rp. <?= number_format($row->harga_barang); ?></td>
                      <?php } else { ?>
                        <td>Rp. <?= number_format($row->harga_barang); ?></td>
                      <?php } ?>
                      <td>Rp. <?= number_format($row->jumlah_harga); ?></td>
                      <td>
                        <form action="<?= base_url('user/pesanan/batalkan/' . $row->id_pesanan_detail) ?>" method="post">
                          <input type="hidden" name="id" value="<?= $row->id_pesanan_detail ?>">
                          <button type="submit" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-sm btn-danger" title="hapus">Batal</button>
                        </form>
                      </td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <?php if (empty($pesanan->total_harga)) { ?>
                      <td colspan="7" class="text-center">Pesanan Belum Ada <br><a href="<?= base_url('user/dashboard') ?>" style="font-size: 14px;">Kembali ke home</a></td>
                    <?php } else { ?>
                      <td colspan="5"><strong> Total :</strong></td>
                      <td>Rp. <?= number_format($pesanan->total_harga); ?></td>
                      <td>
                        <!-- <a href="<?= base_url('user/pesanan/konfirmasi') ?>" class="btn btn-sm btn-success" onclick="return confirm('apakah anda yakin ?')">Check-out</a> -->
                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">Check out</a>
                      </td>
                    <?php } ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php else : ?>
    <section class="inner-page" data-aos="zoom-out">
      <div class="container">
        <div class="row mt-3">
          <div class="col-md-12">
            <h3>Reseller</h3>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama Motif</th>
                    <th scope="col">Jumlah Pesanan</th>
                    <th scope="col">Harga / pcs</th>
                    <th scope="col">Jumlah Harga</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pesanan_detail as $row) { ?>
                    <tr>
                      <th scope="row"><?= $no++; ?></th>
                      <td><img src="<?= base_url('assets/barang/' . $row->foto_barang); ?>" class="img" width="100">></td>
                      <td><?= $row->nama_motif; ?></td>
                      <td><?= $row->jumlah_barang; ?> Pcs</td>
                      <?php if ($row->jumlah_barang >= 20) { ?>
                        <td>Rp. <?= number_format($row->harga_barang); ?></td>
                      <?php } else { ?>
                        <td>Rp. <?= number_format($row->harga_barang); ?></td>
                      <?php } ?>
                      <td>Rp. <?= number_format($row->jumlah_harga); ?></td>
                      <td>
                        <form action="<?= base_url('user/pesanan/batalkan/' . $row->id_pesanan_detail) ?>" method="post">
                          <input type="hidden" name="id" value="<?= $row->id_pesanan_detail ?>">
                          <button type="submit" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-sm btn-danger" title="hapus">Batal</button>
                        </form>
                      </td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <?php if (empty($pesanan->total_harga)) { ?>
                      <td colspan="7" class="text-center">Pesanan Belum Ada <br><a href="<?= base_url('user/dashboard') ?>" style="font-size: 14px;">Kembali ke home</a></td>
                    <?php } else { ?>
                      <td colspan="5"><strong> Total :</strong></td>
                      <td>Rp. <?= number_format($pesanan->total_harga); ?></td>
                      <td>
                        <!-- <a href="<?= base_url('user/pesanan/konfirmasi') ?>" class="btn btn-sm btn-success" onclick="return confirm('apakah anda yakin ?')">Check-out</a> -->
                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">Check out</a>
                      </td>
                    <?php } ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <p style="height: 200px;"></p>

</main>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pembelian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('user/pesanan/konfirmasi') ?>" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama">Nama Pembeli</label>
                <input type="text" class="form-control" id="nama" value="<?= $user['nama']; ?>" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_tlp_pesanan">No Telepon</label>
                <input type="text" class="form-control" id="no_tlp_pesanan" value="<?= $user['no_tlp']; ?>" name="no_tlp_pesanan" readonly>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat_pesanan">Alamat</label>
            <textarea class="form-control" name="alamat_pesanan" readonly=""><?= $user['alamat']; ?></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kecamatan_pesanan">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan_pesanan" name="kecamatan_pesanan" value="<?= $user['kecamatan']; ?>" name="kecamatan_pesanan" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_pos_pesanan">Kode Pos</label>
                <input type="text" class="form-control" id="kode_pos_pesanan" name="kode_pos_pesanan" value="<?= $user['kode_pos']; ?>" readonly>
              </div>
            </div>
          </div>
          <p style="color: red">Klik tombol konfirmasi jika data sudah benar, Jika data salah maka silahkan <a href="<?= base_url('user/profile'); ?>">edit profile</a></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Konfirmasi</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal DROPSHIP -->
<div class="modal fade" id="dropship" tabindex="-1" aria-labelledby="dropshipLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dropshipLabel">Form Pembelian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('user/pesanan/konfirmasi') ?>" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama">Nama Pembeli</label>
                <input type="text" class="form-control" id="nama" value="<?= $user['nama']; ?>" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_tlp_pesanan">No Telepon</label>
                <input type="text" class="form-control" id="no_tlp_pesanan" required="" name="no_tlp_pesanan">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat_pesanan">Alamat</label>
            <textarea class="form-control" required="" name="alamat_pesanan"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kecamatan_pesanan">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan_pesanan" required="" name="kecamatan_pesanan" required="" name="kecamatan_pesanan">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_pos_pesanan">Kode Pos</label>
                <input type="text" class="form-control" id="kode_pos_pesanan" required="" name="kode_pos_pesanan">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Konfirmasi</button>
        </div>
      </form>
    </div>
  </div>
</div>