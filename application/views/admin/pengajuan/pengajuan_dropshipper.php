
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
                        <th>Nama</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Bukti Foto</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($dropshipper as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->no_tlp; ?></td>
                        <td><?= $row->alamat; ?></td>
                        <td><img src="<?= base_url('assets/pengajuan_dropshipper/'.$row->foto_bukti); ?>" width="120px"></td>
                        <td>
                            <?php if($row->status_pengajuan == 'tolak') { ?>
                            <a href="#" class="btn btn-sm btn-danger disabled">ditolak</a>                           
                            <?php } else { ?>
                            <a href="<?= base_url('admin/pengajuan/terima_dropshipper/'.$row->id_pengajuan); ?>" class="btn btn-sm btn-success">Terima</a>                           
                            <a href="<?= base_url('admin/pengajuan/tolak_dropshipper/'.$row->id_pengajuan); ?>" class="btn btn-sm btn-danger">Tolak</a>                           
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
