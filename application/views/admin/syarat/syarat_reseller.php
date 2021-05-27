
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

<div class="row">
    <div class="col-md-6">
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_syarat"><i class="fas fa-plus"></i> Tambah syarat</a>
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
                        <th>Syarat</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($syarat as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->syarat; ?></td>
                        <td>
                            <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit_syarat<?= $row->id_syarat; ?>"><i class="fas fa-pen"></i></a>
                            <a href="<?= base_url('admin/syarat/hapus_syarat_reseller/'.$row->id_syarat); ?>" class="btn btn-sm btn-danger" onclick="confirm('yakin ingin menghapus ?')"><i class="fas fa-trash"></i></a>                            
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah_syarat" tabindex="-1" role="dialog" aria-labelledby="tambah_syaratLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_syaratLabel">Tambah syarat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/syarat/tambah_syarat_reseller'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Syarat</label>
                            <input type="text" name="syarat" class="form-control" required>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
</div>

<!-- EDIT -->
<?php
$no = 0;
foreach ($syarat as $row) : $no++; ?>
    <div class="modal fade" id="edit_syarat<?= $row->id_syarat; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_syaratLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_syaratLabel">Edit syarat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url(); ?>admin/syarat/edit_syarat_reseller/<?= $row->id_syarat; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row->id_syarat; ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul syarat</label>
                                    <input type="text" name="syarat" class="form-control" required value="<?= $row->syarat ?>">
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
