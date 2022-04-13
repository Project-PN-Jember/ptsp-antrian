<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Website Admin Antrian - Pengadilan Negeri Jember">
    <meta name="author" content="Falah Yafi & Mikhail">

    <!-- Icon -->
    <link rel="icon" href="<?= base_url('assets/img/icon.png') ?>">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sbadmin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    
    <title><?= $title; ?> - PTSP PN Jember</title>
  </head>
  <body>
  <!-- Image and text -->
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <div class="container">
      <a class="navbar-brand font-weight-bold " href="<?= site_url(); ?>">
        <img src="<?= base_url('assets/img/icon.png') ?>" width="40" alt="">
        PTSP PN JEMBER
      </a>
      <ul class="navbar-nav">
        <a href="<?= site_url(); ?>" class="btn btn-primary btn-sm font-weight-bold"><i class="fa-solid fa-arrow-left"></i> PTSP</a>
      </ul>
    </div>
  </nav>
  
  <!-- End of Topbar -->
  <main class="flex-shrink-0">
    <div class="container">
      <!-- Total Admin -->
      <div class="row">
        <!-- Jumlah Antrian Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Antrian</div>
                            <div id="jumlah-antrian" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Antrian Sekarang Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Antrian Sekarang</div>
                            <div id="antrian-sekarang" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <!-- Antrian Selanjutnya Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Antrian Selanjutnya</div>
                            <div id="antrian-selanjutnya" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sisa Antrian Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Sisa Antrian</div>
                            <div id="sisa-antrian" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- End Baris Pertama -->
      
      <!-- Baris Kedua -->
      <div class="row">
        <div class="col-md-4">
          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold h4 text-primary text-center"><?= strtoupper($dataCs->level); ?></h6>
            </div>
            <img class="card-img-top mx-auto p-3 rounded-circle" src="<?= site_url('files/user/') . $dataCs->foto; ?>" alt="Card image cap" style="width: 250px;height: 250px;object-fit: cover;">
            <div class="card-body pt-1">
              <p class="text-center h4 font-weight-bold text-gray-800"><?= $dataCs->nama; ?></p>
              <div class="row my-3" id="CsStatus">
                <!-- Status Cs -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">   
          <div class="card mb-4">
            <div class="card-body">
              <!-- <h5 class="card-title"></h5> -->
              <p class="card-text mb-1 font-weight-bold text-primary text-center">
                Pemberitahuan 
              </p>
              <p class="card-text text-center">
                <small class="text-muted">
                Agar bisa dilayani oleh CS Kami silahkan anda mengisi form dibawah untuk mendapatkan nomer antrian
                </small>
              </p>
            </div>
          </div>
          <div id="form-antrian">
            <?php if(!$this->session->userdata('statusDaftarAntrian')): ?>
            <!-- Form Antrian -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Nomor Antrian</h6>
              </div>
              <form class="needs-validation" id="myForm" novalidate>
              <div class="card-body">
                <div class="form-group row">
                  <label for="Email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="Email" name="email" placeholder="Email Optional">
                    <div class="valid-feedback">
                      Bagus!
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama <span class="text-danger">*<span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama anda..." required>
                    <div class="valid-feedback">
                      Bagus!
                    </div>
                    <div class="invalid-feedback"> Tolong diisi </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="telp" class="col-sm-2 col-form-label">Whatsapp <span class="text-danger">*<span></label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="telp" name="telp" placeholder="Ex: 085123456789" required>
                    <div class="valid-feedback">
                      Bagus!
                    </div>
                    <div class="invalid-feedback"> Tolong diisi, minimal 10 angka :) </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right text-muted">
                <a type="button" class="btn btn-secondary" href="<?= site_url(''); ?>">Batal</a>
                <button class="btn btn-primary" id="btnSave" onclick="save()">Kirim</button>
              </div>
              </form>
            </div>
            <!-- End Form Antrian -->
            <?php else: ?>
              
            <!-- Form Antrian Berhasil -->
            <div class="card shadow mb-4">
              <div class="card-body row">
                <div class="col-md-4 mb-3 my-auto">
                  <div class="card text-center">
                    <div class="card-body">
                      <h5 class="card-title h5">No. Antrian</h5>
                      <p class="card-text font-weight-bold h1"><?= $this->session->userdata('statusDaftarAntrian')['no_antrian']; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-header font-weight-bold">
                      <i class="fa-solid fa-user-astronaut"></i> | <?= $this->session->userdata('statusDaftarAntrian')['nama']; ?>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><i class="fa-solid fa-envelope-open"></i> | <?= $this->session->userdata('statusDaftarAntrian')['email']; ?></li>
                      <li class="list-group-item"><i class="fa-brands fa-whatsapp-square"></i> | <?= $this->session->userdata('statusDaftarAntrian')['telp_wa']; ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Form Antrian Berhasil -->
            <?php endif; ?>
          </div>
        </div>  
      </div>
      <!-- End Baris Kedua -->  
    </div>
  </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/sweetalert/sweetalert.min.js"></script>
    <script>
      let id = '<?= $this->secure->encrypt_url($dataCs->id); ?>';
      // console.log(id);
      (function() {
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
      </script>
      <script src="<?= base_url('assets/'); ?>action/viewCs.js"></script>
  </body>
</html>