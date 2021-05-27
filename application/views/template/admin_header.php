
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url(); ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN BOXER</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($this->uri->segment(2) == 'dashboard') {echo "active" ; } ?>">
                <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item <?php if($this->uri->segment(3) == 'index' || $this->uri->segment(3) == 'data_reseller' || $this->uri->segment(3) == 'data_dropshipper' ) {echo "active" ; } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola User</span>
                </a>
                <div id="collapseOne" class="collapse <?php if($this->uri->segment(3) == 'index' || $this->uri->segment(3) == 'data_reseller' || $this->uri->segment(3) == 'data_dropshipper' ) {echo "show" ; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola User:</h6>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'index') {echo "active" ; } ?>" href="<?= base_url('admin/user/index'); ?>">Data User</a>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'data_reseller') {echo "active" ; } ?>" href="<?= base_url('admin/user/data_reseller'); ?>">Data Reseller</a>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'data_dropshipper') {echo "active" ; } ?>" href="<?= base_url('admin/user/data_dropshipper'); ?>">Data Dropshipper</a>
                    </div>
                </div>
            </li>

            <li class="nav-item <?php if($this->uri->segment(3) == 'pengajuan_reseller' || $this->uri->segment(3) == 'pengajuan_dropshipper') {echo "active" ; } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Laporan Pengajuan</span>
                </a>
                <div id="collapseTwo" class="collapse <?php if($this->uri->segment(3) == 'pengajuan_reseller' || $this->uri->segment(3) == 'pengajuan_dropshipper') {echo "show" ; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan Pengajuan:</h6>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'pengajuan_reseller') {echo "active" ; } ?>" href="<?= base_url('admin/pengajuan/pengajuan_reseller'); ?>">Reseller</a>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'pengajuan_dropshipper') {echo "active" ; } ?>" href="<?= base_url('admin/pengajuan/pengajuan_dropshipper'); ?>">Dropshipper</a>
                    </div>
                </div>
            </li>

            <li class="nav-item <?php if($this->uri->segment(3) == 'syarat_reseller' || $this->uri->segment(3) == 'syarat_dropshipper'|| $this->uri->segment(3) == 'syarat_return') {echo "active" ; } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Persyaratan</span>
                </a>
                <div id="collapseThree" class="collapse <?php if($this->uri->segment(3) == 'syarat_reseller' || $this->uri->segment(3) == 'syarat_dropshipper'|| $this->uri->segment(3) == 'syarat_return') {echo "show" ; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Persyaratan:</h6>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'syarat_reseller') {echo "active" ; } ?>" href="<?= base_url('admin/syarat/syarat_reseller'); ?>">Syarat Reseller</a>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'syarat_dropshipper') {echo "active" ; } ?>" href="<?= base_url('admin/syarat/syarat_dropshipper'); ?>">Syarat Dropshipper</a>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'syarat_return') {echo "active" ; } ?>" href="<?= base_url('admin/syarat/syarat_return'); ?>">Syarat Return</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Update Data
            </div>

            <li class="nav-item <?php if($this->uri->segment(2) == 'data_boxer') {echo "active" ; } ?>">
                <a class="nav-link" href="<?= base_url('admin/data_boxer'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Barang</span></a>
            </li>

            <li class="nav-item <?php if($this->uri->segment(3) == 'data_transaksi' || $this->uri->segment(3) == 'data_transaksi_reseller' || $this->uri->segment(3) == 'data_transaksi_dropshipper'|| $this->uri->segment(3) == 'riwayat_transaksi' ) {echo "active" ; } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse"
                    aria-expanded="true" aria-controls="collapse">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola Transaksi</span>
                </a>
                <div id="collapse" class="collapse <?php if($this->uri->segment(3) == 'data_transaksi' || $this->uri->segment(3) == 'data_transaksi_reseller' || $this->uri->segment(3) == 'data_transaksi_dropshipper'|| $this->uri->segment(3) == 'riwayat_transaksi' ) {echo "show" ; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola User:</h6>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'data_transaksi') {echo "active" ; } ?>" href="<?= base_url('admin/transaksi/data_transaksi'); ?>">Data Transaksi</a>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'data_transaksi_reseller') {echo "active" ; } ?>" href="<?= base_url('admin/transaksi/data_transaksi_reseller'); ?>">Data Transaksi Reseller</a>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'data_transaksi_dropshipper') {echo "active" ; } ?>" href="<?= base_url('admin/transaksi/data_transaksi_dropshipper'); ?>">Data Transaksi Dropshipper</a>
                        <a class="collapse-item <?php if($this->uri->segment(3) == 'riwayat_transaksi') {echo "active" ; } ?>" href="<?= base_url('admin/transaksi/riwayat_transaksi'); ?>">Riwayat Transaksi</a>
                    </div>
                </div>
            </li>      

            <li class="nav-item <?php if($this->uri->segment(2) == 'return_barang') {echo "active" ; } ?>">
                <a class="nav-link" href="<?= base_url('admin/return_barang'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Return Barang</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <li class="nav-item <?php if($this->uri->segment(2) == 'berita') {echo "active" ; } ?>">
                <a class="nav-link" href="<?= base_url('admin/berita'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Berita</span></a>
            </li>

            <li class="nav-item <?php if($this->uri->segment(2) == 'event') {echo "active" ; } ?>">
                <a class="nav-link" href="<?= base_url('admin/event'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Event</span></a>
            </li>            

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Pesanan
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?= base_url(); ?>assets/admin/img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Selengkapnya..</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Akun</span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url(); ?>assets/admin/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                	<!-- isian -->
                