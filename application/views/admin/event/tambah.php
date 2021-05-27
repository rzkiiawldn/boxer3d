
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
                    <label>Foto event</label>
                    <input type="file" name="foto_event" class="form-control">
                    <?= form_error('foto_event', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Akhir Event</label>
                    <input type="date" name="tanggal_akhir" class="form-control" value="<?= set_value('tanggal_akhir'); ?>">
                    <?= form_error('tanggal_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Deskripsi event</label>
                    <textarea name="deskripsi_event" class="form-control" rows="10"><?= set_value('deskripsi_event'); ?></textarea>
                    <?= form_error('deskripsi_event', '<small class="text-danger pl-3">', '</small>'); ?>
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