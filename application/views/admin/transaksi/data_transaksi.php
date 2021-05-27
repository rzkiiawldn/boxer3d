
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    
                    <tr>
                        <th width="5%">#</th>
                        <th>Tanggal Pesanan</th>
                        <th>Nama</th>
                        <th>Motif</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th width="8%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($pesanan as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->tanggal_pesanan; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->nama_motif; ?></td>
                        <td><?= $row->jumlah_barang; ?></td>
                        <td>Rp. <?= number_format($row->jumlah_harga + $row->kode_bayar); ?></td>
                        <td><?php if($row->bukti_pembayaran == '') {
                            echo 'menunggu pembayaran';
                        } else {
                            echo 'lihat bukti pembayaran';
                        } ?></td>
                        <td>
                            <a href="" class="btn btn-sm btn-info">detail</a>                           
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
