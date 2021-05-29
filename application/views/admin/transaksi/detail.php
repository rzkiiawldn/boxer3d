<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <?= $judul; ?>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th width="30%">Nama Pemesan</th>
                            <td width="70%">: <?= $pesanan['nama']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Nomor Telepon</th>
                            <td width="70%">: <?= $pesanan['no_tlp_pesanan']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Alamat</th>
                            <td width="70%">: <?= $pesanan['alamat_pesanan']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Kecamatan</th>
                            <td width="70%">: <?= $pesanan['kecamatan_pesanan']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Kode Pos</th>
                            <td width="70%">: <?= $pesanan['kode_pos_pesanan']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Tanggal pesanan</th>
                            <td width="70%">: <?= $pesanan['tanggal_pesanan']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Nama Barang</th>
                            <td width="70%">: <?= $pesanan['nama_motif']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Kode Bayar</th>
                            <td width="70%">: <?= $pesanan['kode_bayar']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Total </th>
                            <td width="70%">: Rp. <?= number_format($pesanan['total_harga'] + $pesanan['kode_bayar'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Status pesanan</th>
                            <td width="70%">:
                                <?php if ($pesanan['status'] == 1) {
                                    echo "sudah dipesan & belum dibayar";
                                } elseif ($pesanan['status'] == 2) {
                                    echo "sudah dibayar";
                                } else {
                                    echo "pesanan selesai";
                                } ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Pembayaran</th>
                            <td width="70%">:
                                <?php if ($pesanan['bukti_pembayaran'] == '') { ?>
                                    Belum melakukan pembayaran
                                <?php } else { ?>
                                    Pembayaran sudah dilakukan | <a href="" class="badge badge-info" data-toggle="modal" data-target="#lihatBukti<?= $pesanan['id_pesanan'] ?>">Lihat bukti pembayaran</a>
                                <?php } ?>
                            </td>
                            <?php if ($pesanan['bukti_pembayaran'] == '') {
                            } else { ?>
                        <tr>
                            <th width="30%"></th>
                            <td width="70%">
                                <?php if ($pesanan['status'] == 3) { ?>
                                    <a class="btn btn-success btn-sm">Pesanan Selesai</a>
                                <?php } else { ?>
                                    <form action="<?= base_url('admin/transaksi/selesai/' . $pesanan['id_pesanan']) ?>" method="post">
                                        <input type="hidden" name="status" value="3">
                                        : <button type="submit" class="btn btn-danger btn-sm">Konfirmasi pesanan</button>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Pesanan</th>
                                <th scope="col">Harga / pcs</th>
                                <th scope="col">Jumlah Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pesanan_detail as $row) { ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><img src="<?= base_url('assets/barang/' . $row->foto_barang); ?>" width="100px"></td>
                                    <td><?= $row->nama_motif; ?></td>
                                    <td><?= $row->jumlah_barang; ?> Brg</td>
                                    <td>Rp. <?= number_format($row->harga_barang); ?></td>
                                    <td>Rp. <?= number_format($row->jumlah_harga); ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="5" align="right"><strong> Total :</strong></td>
                                <td>Rp. <?= number_format($pesanan['total_harga']); ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong> Kode Unik Pembayaran :</strong></td>
                                <td>Rp. <?= number_format($pesanan['kode_bayar']); ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong> Total Yang Harus Dibayar :</strong></td>
                                <td>Rp. <?= number_format($pesanan['total_harga'] + $pesanan['kode_bayar']); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lihatBukti<?= $pesanan['id_pesanan'] ?>" tabindex="-1" role="dialog" aria-labelledby="lihatBuktiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lihatBuktiLabel">Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class=" modal-body">
                <div class="form-group">
                    <img src="<?= base_url('assets/bukti_pembayaran/' . $pesanan['bukti_pembayaran']) ?>" class="img img-fluid" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>