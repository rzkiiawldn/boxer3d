
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
                        <th>Tanggal Return</th>
                        <th>Nama</th>
                        <th>Alasan Return</th>
                        <th>Status</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($return_barang as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->tanggal_return; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->alasan_return; ?></td>
                        <td>
                        	<?php if($row->status_return == 'tolak') { ?>
                            <a href="#" class="btn btn-sm btn-danger">ditolak</a>                         
                            <?php } elseif($row->status_return == 'terima') { ?>
                            <a href="#" class="btn btn-sm btn-success">diterima</a> 
                            <?php } else { ?>                        
                            <a href="<?= base_url('admin/return_barang/terima/'.$row->id_return); ?>" class="btn btn-sm btn-success" onclick="return confirm('apakah anda yakin ?')">Terima</a>                           
                            <a href="<?= base_url('admin/return_barang/tolak/'.$row->id_return); ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ?')">Tolak</a>                           
                            <?php } ?>
                        </td>
                        <td><a href="<?= base_url('admin/return_barang/detail/'.$row->id_return); ?>" class="btn btn-sm btn-info">detail</a></td>
                        
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
