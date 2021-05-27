
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

            <input type="hidden" name="id_event" class="form-control" value="<?= $event->id_event; ?>">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="foto_event">Foto event</label>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/event/' . $event->foto_event); ?>" class="img-thumbnail" for="foto_event">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" name="foto_event" class="custom-file-input" id="foto_event">
                                    <label class="custom-file-label" for="custom-file">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Akhir Event</label>
                    <input type="date" name="tanggal_akhir" class="form-control" value="<?= $event->tanggal_akhir; ?>">
                    <?= form_error('tanggal_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Deskripsi event</label>
                    <textarea name="deskripsi_event" class="form-control" rows="10"><?= $event->deskripsi_event; ?></textarea>
                    <?= form_error('deskripsi_event', '<small class="text-danger pl-3">', '</small>'); ?>
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