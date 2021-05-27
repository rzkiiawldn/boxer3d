<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $judul; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/user/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/user/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/user/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/user/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/user/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/user/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/user/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/user/vendor/owl.carousel/<?= base_url() ?>assets/user/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/user/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/user/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center  <?= $this->uri->segment(3) == 'dashboard' ? 'header-transparent' : null; ?> ">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="<?= base_url('user/dashboard') ?>">BOXER3D</a></h1>
            </div>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                        <li><a href="<?= base_url('user/dashboard'); ?>">Home</a></li>
                        <?php if($user['reseller'] == 1 || $user['dropship'] == 1) { } else { ?>
                        <li class="drop-down text-capitalize"><a href="">Pengajuan</a>
                            <ul>
                                <li><a href="<?= base_url('user/pengajuan/pengajuan_reseller') ?>">Pengajuan Reseller</a></li>
                                <li><a href="<?= base_url('user/pengajuan/pengajuan_dropshipper') ?>">Pengajuan Dropshipper</a></li>    
                            </ul>
                        </li>
                        <?php } ?>

                        <li><a href="<?= base_url('user/event'); ?>">Event</a></li>
                        <li><a href="<?= base_url('user/berita'); ?>">Berita</a></li>
                        <li class="active"><a href="<?= base_url('user/pesanan/keranjang'); ?>"><i class="icofont-shopping-cart"></i></a></li>
                        <li><a href="<?= base_url('user/pesanan/riwayat_pesanan'); ?>">Riwayat Transaksi</a></li>

                        <li class="drop-down text-capitalize"><a href=""><?= $user['nama']; ?></a>
                            <ul>
                                <li><a href="<?= base_url('user/return_barang') ?>">Return Barang</a></li>
                                <li><a href="<?= base_url('user/profile') ?>">Edit Profil</a></li>
                                <li><a href="<?= base_url('auth/logout') ?>" onclick="return confirm('yakin ingin keluar ?')">Logout</a></li>
                            </ul>
                        </li>

                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->