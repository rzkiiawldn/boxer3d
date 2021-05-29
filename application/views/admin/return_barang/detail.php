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
                            <td width="70%">: <?= $return['nama']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Nomor Telepon</th>
                            <td width="70%">: <?= $return['no_tlp']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Tanggal return</th>
                            <td width="70%">: <?= $return['tanggal_return']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Alasan Return</th>
                            <td width="70%">: <?= $return['alasan_return']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Status return</th>
                            <td width="70%">: <?= $return['status_return']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Video Bukti</th>
                            <td width="70%">: <video src="<?= base_url('assets/return_barang/'.$return['video']); ?>" controls></video></td>
                        </tr>
                        <?php if($return['status_return'] == 'proses') { ?>
                    	<tr>
                            <th width="30%">Konfirmasi</th>
                            <td width="70%">: 
                            	<a href="<?= base_url('admin/return_barang/terima/'.$row->id_return); ?>" class="btn btn-sm btn-success" onclick="return confirm('apakah anda yakin ?')">Terima</a>                           
	                            <a href="<?= base_url('admin/return_barang/tolak/'.$row->id_return); ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ?')">Tolak</a>  
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if($return['status_return'] == 'terima') { ?>
                        <tr>
                            <th width="30%">Alamat Pengembalian</th>
                            <td width="70%">: <?= $return['alamat_pengembalian']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Nama Bank & Rekening</th>
                            <td width="70%">: <?= $return['nama_bank']; ?>, <?= $return['rekening']; ?></td>
                        </tr>
                        <tr>
                            <th width="30%">Foto Resi</th>
                            <td width="70%">: <img src="<?= base_url('assets/foto_resi/'.$return['foto_resi']); ?>" class="img" width="300"></td>
                        </tr>
	                    <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>