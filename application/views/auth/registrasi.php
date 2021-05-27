<main>
	<div class="container">
		<div class="row justify-content-center my-5">
			<div class="col-md-8">
				<div class="card shadow-sm p-3 mb-5 bg-white rounded">
					<div class="card-header">
						<h5>Buat Akun Baru !</h5>
					</div>
				  <div class="card-body">
				    <form action="" method="post">
						<div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="nama">Nama Lengkap</label>
						      <input type="text" class="form-control" id="nama" value="<?= set_value('nama'); ?>" name="nama">
						      <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="email">Email Aktif</label>
						      <input type="email" class="form-control" id="email" value="<?= set_value('email'); ?>" name="email">
						      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						</div>
						<div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="no_tlp">No Telepon</label>
						      <input type="number" class="form-control" id="no_tlp" value="<?= set_value('no_tlp'); ?>" name="no_tlp">
						      <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="alamat">Alamat</label>
						      <input type="text" class="form-control" id="alamat" value="<?= set_value('alamat'); ?>" name="alamat">
						      <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						</div>
						<div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="kecamatan">Kecamatan</label>
						      <input type="text" class="form-control" id="kecamatan" value="<?= set_value('kecamatan'); ?>" name="kecamatan">
						      <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="kode_pos">Kode Pos</label>
						      <input type="kode_pos" class="form-control" id="kode_pos" value="<?= set_value('kode_pos'); ?>" name="kode_pos">
						      <?= form_error('kode_pos', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						</div>
						<div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="password1">Password</label>
						      <input type="password" class="form-control" id="password1" value="<?= set_value('password1'); ?>" name="password1">
						      <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="password2">Konfirmasi Password</label>
						      <input type="password" class="form-control" id="password2" name="password2">
						    </div>
						</div>
					  <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
					</form>
					<hr>
					<div class="text-center">
						<a href="<?= base_url('auth'); ?>">Sudah punya akun ? silahkan login</a>
					</div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</main>