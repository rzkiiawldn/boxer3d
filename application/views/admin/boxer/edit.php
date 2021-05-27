
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>

    <?= form_open_multipart() ?>
    <div class="card mb-3 col-lg-12">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Motif</label>
                    <input type="text" name="nama_motif" class="form-control" value="<?= $barang->nama_motif ?>">
                    <?= form_error('nama_motif', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Harga Barang</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="number" name="harga_barang" class="form-control" value="<?= $barang->harga_barang ?>">
                    </div>
                    <?= form_error('harga_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Stok Barang</label>
                    <input type="number" name="stok_barang" class="form-control" value="<?= $barang->stok_barang ?>">
                    <?= form_error('stok_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="foto_barang">Foto Barang</label>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/barang/' . $barang->foto_barang); ?>" class="img-thumbnail" for="foto_barang">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" name="foto_barang" class="custom-file-input" id="foto_barang">
                                    <label class="custom-file-label" for="custom-file">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary float-right">Tambah</button>
            </div>
        </div>
    </div>
    <?= form_close(); ?>