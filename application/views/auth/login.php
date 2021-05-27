<main>
	<div class="container">
		<div class="row justify-content-center my-5">
			<div class="col-md-6">
				<div class="card shadow-sm p-3 mb-5 bg-white rounded">
					<div class="card-header">
						<h5>Silahkan Login !</h5>
					</div>
				  <div class="card-body">
				  	<?= $this->session->flashdata('pesan'); ?>
				    <form action="" method="post">
					  <div class="form-group">
					    <label for="email">Email</label>
					    <input type="text" class="form-control" id="email" value="<?= set_value('email'); ?>" name="email">
					    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					    <label for="password">Password</label>
					    <input type="password" class="form-control" id="password" name="password">
					    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
					  </div>
					  <button type="submit" class="btn btn-primary btn-block">Login</button>
					</form>
					<hr>
					<div class="text-center">
						<a href="<?= base_url('auth/registrasi'); ?>">Buat akun baru</a>
					</div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</main>