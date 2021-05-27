
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

<div class="row">
    <div class="col-md-6">
        <a href="<?= base_url('admin/data_boxer/tambah_motif'); ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Motif</a>
    </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    
                    <tr>
                        <th width="5%">#</th>
                        <th>Nama Motif</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Foto</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($barang as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama_motif; ?></td>
                        <td>Rp. <?= number_format($row->harga_barang); ?></td>
                        <td><?= $row->stok_barang; ?></td>
                        <td><img src="<?= base_url('assets/barang/'. $row->foto_barang); ?>" class="img" width="150"></td>
                        <td>
                            <a href="<?= base_url('admin/data_boxer/edit_motif/'.$row->id_barang); ?>" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                            <a href="<?= base_url('admin/data_boxer/hapus_motif/'.$row->id_barang); ?>" class="btn btn-sm btn-danger" onclick="confirm('yakin ingin menghapus ?')"><i class="fas fa-trash"></i></a>                            
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
