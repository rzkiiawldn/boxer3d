
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

<div class="row">
    <div class="col-md-6">
        <a href="<?= base_url('admin/berita/tambah_berita'); ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Berita</a>
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
                        <th>Judul Berita</th>
                        <th>Tanggal Input</th>
                        <th>View</th>
                        <th>Foto Berita</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($berita as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->judul_berita; ?></td>
                        <td><?= $row->tanggal_input; ?></td>
                        <td><?= $row->view; ?></td>
                        <td><img src="<?= base_url('assets/berita/'. $row->foto_berita); ?>" class="img" width="150"></td>
                        <td>
                            <a href="<?= base_url('admin/berita/edit_berita/'.$row->id_berita); ?>" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                            <a href="<?= base_url('admin/berita/hapus_berita/'.$row->id_berita); ?>" class="btn btn-sm btn-danger" onclick="confirm('yakin ingin menghapus ?')"><i class="fas fa-trash"></i></a>                            
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
