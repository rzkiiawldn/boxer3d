
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
            <input type="hidden" name="id_berita" class="form-control" value="<?= $berita->id_berita; ?>">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Judul Berita</label>
                    <input type="text" name="judul_berita" class="form-control" value="<?= $berita->judul_berita; ?>">
                    <?= form_error('judul_berita', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="foto_berita">Foto Berita</label>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/berita/' . $berita->foto_berita); ?>" class="img-thumbnail" for="foto_berita">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" name="foto_berita" class="custom-file-input" id="foto_berita">
                                    <label class="custom-file-label" for="custom-file">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Isi berita</label>
                    <textarea name="isi_berita" class="form-control" rows="10"><?= $berita->isi_berita; ?></textarea>
                    <?= form_error('isi_berita', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary float-right">Edit</button>
            </div>
        </div>
    </div>
    <?= form_close(); ?>