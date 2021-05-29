
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($data_reseller as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->email; ?></td>
                        <td><?= $row->no_tlp; ?></td>
                        <td><?= $row->alamat; ?></td>
                        <td>
                             <a href="<?= base_url('admin/user/detail/'.$row->id_user); ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="<?= base_url('admin/user/edit_user/'.$row->id_user); ?>" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                            <a href="<?= base_url('admin/user/hapus_user/'.$row->id_user); ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus ?')"><i class="fas fa-trash"></i></a>                          
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
