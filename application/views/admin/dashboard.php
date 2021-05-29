<!-- Begin Page Content -->
<div class="container-fluid">
<?= $this->session->flashdata('message'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

	<div class="row">
		<div class="col-xl-4 col-md-6 mb-4">
		  <div class="card border-left-primary shadow h-100 py-2">
		    <div class="card-body">
		      <div class="row no-gutters align-items-center">
		        <div class="col mr-2">
		          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User</div>
		          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_user; ?></div>
		        </div>
		        <div class="col-auto">
		          <a href="<?= base_url(); ?>admin/user"><i class="fas fa-user fa-2x text-gray-300"></i></a>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4">
		  <div class="card border-left-primary shadow h-100 py-2">
		    <div class="card-body">
		      <div class="row no-gutters align-items-center">
		        <div class="col mr-2">
		          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Reseller</div>
		          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_reseller; ?></div>
		        </div>
		        <div class="col-auto">
		          <a href="<?= base_url(); ?>admin/user/data_reseller"><i class="fas fa-user fa-2x text-gray-300"></i></a>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="col-xl-4 col-md-6 mb-4">
		  <div class="card border-left-primary shadow h-100 py-2">
		    <div class="card-body">
		      <div class="row no-gutters align-items-center">
		        <div class="col mr-2">
		          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Dropshipper</div>
		          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_dropshipper; ?></div>
		        </div>
		        <div class="col-auto">
		          <a href="<?= base_url(); ?>admin/user/data_dropshipper"><i class="fas fa-user fa-2x text-gray-300"></i></a>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-primary shadow h-100 py-2">
		    <div class="card-body">
		      <div class="row no-gutters align-items-center">
		        <div class="col mr-2">
		          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transaksi</div>
		          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_transaksi; ?></div>
		        </div>
		        <div class="col-auto">
		          <a href="<?= base_url(); ?>admin/transaksi/data_transaksi"><i class="fas fa-user fa-2x text-gray-300"></i></a>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-primary shadow h-100 py-2">
		    <div class="card-body">
		      <div class="row no-gutters align-items-center">
		        <div class="col mr-2">
		          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transaksi Reseller</div>
		          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_transaksi_reseller; ?></div>
		        </div>
		        <div class="col-auto">
		          <a href="<?= base_url(); ?>admin/transaksi/data_transaksi_reseller"><i class="fas fa-user fa-2x text-gray-300"></i></a>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-primary shadow h-100 py-2">
		    <div class="card-body">
		      <div class="row no-gutters align-items-center">
		        <div class="col mr-2">
		          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transaksi Dropshipper</div>
		          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_transaksi_dropshipper; ?></div>
		        </div>
		        <div class="col-auto">
		          <a href="<?= base_url(); ?>admin/transaksi/data_transaksi_dropshipper"><i class="fas fa-user fa-2x text-gray-300"></i></a>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-primary shadow h-100 py-2">
		    <div class="card-body">
		      <div class="row no-gutters align-items-center">
		        <div class="col mr-2">
		          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Return Barang</div>
		          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_return; ?></div>
		        </div>
		        <div class="col-auto">
		          <a href="<?= base_url(); ?>admin/return_barang"><i class="fas fa-user fa-2x text-gray-300"></i></a>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url('admin/dashboard/about'); ?>" method="post">
						<div class="form-group">
							<input type="hidden" name="id_about" value="<?= $about->id_about; ?>">
							<label>About</label>
							<textarea class="form-control" name="about" rows="10"><?= $about->about; ?></textarea>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat" rows="5"><?= $about->alamat; ?></textarea>
						</div>
						<button type="submit" class="btn btn-primary float-right">Update data</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>