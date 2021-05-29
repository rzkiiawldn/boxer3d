<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col">
			<h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
		</div>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4 text-uppercase">
		<div class="card-body">
			<form method="post" action="">
				<div class="row">
					<input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $data_user->id_user ?>">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?= $data_user->nama ?>">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>					
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="email">email</label>
							<input type="text" class="form-control" id="email" name="email" value="<?= $data_user->email ?>" readonly>
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="no_tlp">no telepon</label>
							<input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $data_user->no_tlp ?>">
							<?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="alamat">alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data_user->alamat ?>">
							<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="kecamatan">kecamatan</label>
							<input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $data_user->kecamatan ?>">
							<?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="kode_pos">kode pos</label>
							<input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?= $data_user->kode_pos ?>">
							<?= form_error('kode_pos', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
				</div>
<hr><p style="font-size:12px;color:red">Kosongkan jika tidak di isi</p>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="password1">Password Baru</label>
							<input type="password" class="form-control" id="password1" name="password1">
							<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
				</div>
				<button class="btn btn-primary float-right" type="submit">Edit</button>
			</form>
		</div>
	</div>
</div>