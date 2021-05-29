
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

<div class="row">
    <div class="col-md-6">
        <a href="<?= base_url('admin/event/tambah_event'); ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Event</a>
    </div>
</div>
   <div class="row">
        <div class="col">
            <?= $this->session->flashdata('pesan'); ?>
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
                        <th width="25%">Foto Event</th>
                        <th>Deskripsi</th>
                        <th width="20%">Tanggal Akhir</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($event as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><img src="<?= base_url('assets/event/'. $row->foto_event); ?>" class="img" width="150"></td>
                        <td><?= $row->deskripsi_event; ?></td>
                        <td><?= $row->tanggal_akhir; ?></td>
                        <td>
                            <a href="<?= base_url('admin/event/edit_event/'.$row->id_event); ?>" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                            <a href="<?= base_url('admin/event/hapus_event/'.$row->id_event); ?>" class="btn btn-sm btn-danger" onclick="confirm('yakin ingin menghapus ?')"><i class="fas fa-trash"></i></a>                            
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
