
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
                    <label>Judul Berita</label>
                    <input type="text" name="judul_berita" class="form-control" value="<?= set_value('judul_berita'); ?>">
                    <?= form_error('judul_berita', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Foto Berita</label>
                    <input type="file" name="foto_berita" class="form-control">
                    <?= form_error('foto_berita', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Isi berita</label>
                    <textarea name="isi_berita" class="form-control" rows="10"><?= set_value('isi_berita'); ?></textarea>
                    <?= form_error('isi_berita', '<small class="text-danger pl-3">', '</small>'); ?>
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