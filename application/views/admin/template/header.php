<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Website Admin Antrian - Pengadilan Negeri Jember">
    <meta name="author" content="Falah Yafi & Mikhail">

    <title><?= $title; ?> - PTSP PN Jember</title>

    <!-- Icon -->
    <link rel="icon" href="<?= base_url('assets/img/icon.png') ?>">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="<?= base_url('assets/sbadmin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sbadmin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>assets/sweetalert/sweetalert.min.js"></script>
    <script>
        function updateUserDropdown(nameProfile, photoProfile) {
            $('#nameProfile').text(nameProfile)
            $('#photoProfile').prop('src', '<?= base_url('files/user/'); ?>' + photoProfile)
        }
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PTSP <sup>1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($title == "Dashboard") ? 'active' : '';?>">
                <a class="nav-link" href="<?= site_url('dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
 
            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Antrian -->
            <li class="nav-item <?= ($title == "Antrian") ? 'active' : '';?>">
                <a class="nav-link" href="<?= site_url('antrian'); ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Antrian</span></a>
            </li>
            
            <?php if ($this->session->userdata('level') == 'admin'): ?>
            <!-- Nav Item - Management User -->
            <li class="nav-item <?= ($title == "Manajement User") ? 'active' : '';?>">
                <a class="nav-link" href="<?= site_url('user'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Management User</span></a>
            </li>
            <?php endif; ?>
            
            <!-- Nav Item - Profile -->
            <li class="nav-item <?= ($title == "Data Diri") ? 'active' : '';?>">
                <a class="nav-link" href="<?= site_url('profile'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Diri</span></a>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
            
                    <!-- Topbar Search -->

                    <div class="ml-auto card border-left-primary">
                        <div class="card-body px-3 py-2 pr-4">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customStatus" name="statusLayanan">
                                <label class="custom-control-label" for="customStatus" id="labelCustomStatus">Online</label>
                            </div>
                        </div>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="nameProfile"><?= $this->session->userdata('name'); ?></span>
                                <img class="img-profile rounded-circle" id="photoProfile" src="<?= base_url('files/user/').$this->session->userdata('foto'); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= site_url('profile'); ?>" id="profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
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
