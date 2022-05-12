<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Website Admin Antrian - Pengadilan Negeri Jember">
    <meta name="author" content="Falah Yafi & Mikhail">

    <title><?= $title; ?></title>

    <!-- Icon -->
    <link rel="icon" href="<?= base_url('assets/img/icon.png') ?>">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="<?= base_url('assets/sbadmin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sbadmin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .bg-login {
            background-repeat: no-repeat;
            height: 340px;
            margin-top: 15px;
            margin-left: 105px;
        } .cinta {
            background: #b1ffff;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="height: 100vh">

            <div class="col-xl-10 col-lg-12 col-md-9 my-auto">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block cinta">
                                <img src="<?= base_url('assets/img/'); ?>Logo-PN-Jember.png" class="bg-login" alt="PN Jember">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="Login/signIn" method="post" class="needs-validation" novalidate="">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username" aria-describedby="usernameHelp"
                                                placeholder="Enter Username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="loginDataPeserta" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>assets/sweetalert/sweetalert.min.js"></script>

</body>

</html>