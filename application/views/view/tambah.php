<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href=" http://localhost/ptsp/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href=" http://localhost/ptsp/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $title; ?> </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- CSS Files -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href=" http://localhost/ptsp/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href=" http://localhost/ptsp/assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

    <script src="http://localhost/ptsp/assets/sweetalert/sweetalert.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href=" http://localhost/ptsp/assets/css/demo.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->

    <style>
        body {
            background-color: #f8f8f8;
        }

        .hidden {
            display: none;
        }

        .show {
            display: block;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <div class="image-container set-full-height" style="background-color: #eeeeee;">
        <!-- <div class="image-container set-full-height" style="background-image: url('assets/img/wizard.jpg')"> -->

        <!--   Big container   -->
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash', 'Ditambahkan'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="pesan " data-flashdata=data-flashdata="<?= $this->session->flashdata('pesan', 'Ditambahkan'); ?>"></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="pesan " data-flashdata=data-flashdata="<?= $this->session->flashdata('pesan', 'Ditambahkan'); ?>"></div>
        <?php endif; ?>

        <div id="flash" class="flash" data-flashdata="<?= $this->session->flashdata('flash', 'Ditambahkan'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
            <!-- <div class="row mt-3 ">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Selamat Data Anda akan <strong>diperoses</strong><?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div> -->
        <?php endif; ?>




        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <!--      Wizard container        -->
                <div class="wizard-container">

                    <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <form action="http://localhost/ptsp/permohonan/tambah" method="post" enctype="multipart/form-data">
                            <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                            <div class="wizard-header mb-4">
                                <h3>
                                    Surat Permohonan
                                </h3>

                            </div>

                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#informasiPribadi" data-toggle="tab">Informasi Pribadi</a></li>
                                    <li><a href="#dokumentPendukung" data-toggle="tab">Dokument Pendukung</a></li>
                                    <li><a href="#dataLengkap" data-toggle="tab">Data Lengkap</a></li>
                                </ul>

                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="informasiPribadi">
                                    <div class="row">

                                        <div class="col-sm-10 col-sm-offset-1">

                                            <div class="form-group mt-0">
                                                <label for="nama">Nama Pemohon</label>
                                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                                                <small class="form-text text-danger"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                                <small class="form-text text-danger"></small>
                                            </div>

                                            <div class="form-group">
                                                <label for="tempat_tinggal">Tempat tinggal</label>
                                                <input type="text" class="form-control" name="tempat_tinggal" id="tempat_tinggal" placeholder="alamat">
                                                <small class="form-text text-danger"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="nik">nik</label>
                                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan nik">
                                                <small class="form-text text-danger"></small>
                                            </div>


                                            <div class="form-group">
                                                <label for="bank">Bank</label>
                                                <select name="bank" id="bank" class="bank form-control">
                                                    <option value="" selected>- Pilih Bank -</option>
                                                    <option value="BCA">BCA</option>
                                                    <option value="Mandiri">Mandiri
                                                    </option>
                                                    <option value="BNI">BNI
                                                    </option>
                                                    <option value="BTN"> BTN
                                                    </option>
                                                    <option value="BRI"> BRI</option>
                                                    <option value="CIMB Niaga"> CIMB Niaga</option>
                                                    <option value="Bank Jatim"> Bank Jatim</option>
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="no_rek">No Rekening</label>
                                                <input type="text" class="form-control" name="no_rek" id="no_rek" placeholder="masukkan no_rek anda">
                                                <small class="form-text text-danger"></small>
                                            </div>

                                            <div class="form-group mt-0">
                                                <label for="akun_bank">Akun Bank</label>
                                                <input type="text" class="form-control" name="akun_bank" id="akun_bank" placeholder="akun_bank Lengkap">
                                                <small class="form-text text-danger"></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="telepon">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="0000-0000-0000">
                                                <small class="form-text text-danger"></small>
                                            </div>

                                            <div class="form-group mt-0">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="email Lengkap">
                                                <small class="form-text text-danger"></small>
                                            </div>
                                            <div class="form-group mt-0">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat Lengkap">
                                                <small class="form-text text-danger"></small>
                                            </div>


                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" id="jenis_kelamin" class=" form-control">
                                                    <option value="" selected>- Pilih -</option>
                                                    <option value="laki-laki"> Laki-laki</option>
                                                    <option value="perempuan"> Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="agama">agama</label>
                                                <select name="agama" id="agama" class="form-control">
                                                    <option value="" selected>- Pilih -</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="BRI"> BRI</option>
                                                    <option value="CIMB Niaga"> CIMB Niaga</option>
                                                    <option value="Bank Jatim"> Bank Jatim</option>
                                                </select>
                                            </div>

                                            <div class="form-group mt-0">
                                                <label for="pekerjaan">pekerjaan</label>
                                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="pekerjaan ">
                                                <small class="form-text text-danger"></small>
                                            </div>

                                            <div class="form-group">
                                                <label for="ibk">Berkebutuhan Khusus</label>
                                                <select name="ibk" id="ibk" class="form-control">
                                                    <option value="" selected>- Pilih -</option>
                                                    <option value="tidak">Tidak</option>
                                                    <option value="iya">Iya</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="status_kawin">Status Kawin</label>
                                                <select name="status_kawin" id="status_kawin" class=" form-control">
                                                    <option value="" selected>- Pilih -</option>
                                                    <option value="Kawin">Kawin</option>
                                                    <option value="Belum Kawin">Belum Kawin</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pendidikan">pendidikan</label>
                                                <select name="pendidikan" id="pendidikan" class=" form-control">
                                                    <option value="" selected>- Pilih -</option>
                                                    <option value="tidak sekolah">Tidak Sekolah</option>
                                                    <option value="iya">Iya</option>
                                                </select>
                                            </div>


                                            <!-- coba hide show perkara -->

                                            <div class="form-group">
                                                <label for="perkara">Jenis Layanan Yang Dibutuhkan</label>
                                                <select name="perkara" id="perkara" class="perkara form-control">
                                                    <option value="" selected>- Pilih layanan -</option>
                                                    <option value="Permohonan perbaikan nama">PERMOHONAN PERBAIKAN NAMA</option>
                                                    <option value="Permohonan perwalian anak dibawah umur untuk jual beli"> PERMOHONAN PERWALIAN ANAK DIBAWAH UMUR UNTUK JUAL BELI
                                                    </option>
                                                    <option value="Permohonan perwalian tni">PERMOHONAN PERWALIAN TNI
                                                    </option>
                                                    <option value="Pengangkatan anak"> PENGANGKATAN ANAK (ADOPSI)
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="hidden pDetails">
                                                <div class="alert alert-success" role="alert">
                                                    <p> Permohonan Perbaikan Nama untuk kasus-kasus berikut ini</p>
                                                    <p>1. Perbaikan kesalahan (kata atau huruf) nama di akta kelahiran. </p>
                                                    <p>2. Perbaikan kesalahan (kata atau huruf) nama orang tua di akta kelahiran anak</p>
                                                    <p>3. Perbaikan kesalahan tanggal lahir di akta kelahiran</p>
                                                    <p>4. Perbaikan tempat lahir di akta kelahiran</p>
                                                </div>
                                            </div>

                                            <div class="hidden kkDetails">
                                                <div class="alert alert-success" role="alert">
                                                    <p> Ketika mau transaksi kredit di bank dengan menjaminkan aset (tanah/rumah) biasanya ada tanda tangan dr para ahli waris, jika ada ahli waris yang belum dewasa maka bank akan meminta si peminjam uang (yg menjaminkan asetnya tadi) untuk meminta penetapan pengadilan berupa penetapan perwalian anak dibawah umur untuk jual beli
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- wizard 2 -->

                                <div class="tab-pane" id="dokumentPendukung">

                                    <div class="row">

                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="hidden pDetails">
                                                <div class="alert alert-danger" role="alert">
                                                    <p>Besar Dokumen Maksimal 3Mb dengan format pdf atau docx</p>
                                                </div>
                                            </div>

                                            <div class="hidden pDetails">
                                                <div class="form-group">
                                                    <label for="ktp">ktp</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="ktp" name="ktp" value="">
                                                        <label class="custom-file-label" for="ktp">Upload ktp..</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="kk">kk</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="kk" name="kk" value="">
                                                        <label class="custom-file-label" for="kk">Upload kk..</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="surat_nikah">Surat Nikah</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="surat_nikah" name="surat_nikah" value="">
                                                        <label class="custom-file-label" for="surat_nikah">Upload surat_nikah..</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="skbi">surat keterangan beda identitas</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="skbi" name="skbi" value="">
                                                        <label class="custom-file-label" for="skbi">Upload skbi..</label>
                                                    </div>
                                                </div>
                                                <div class="alert alert-success" role="alert">
                                                    <p> Surat Keterangan Beda Identitas adalah Surat Keterangan yang dikeluarkan dari desa yang menerangkan adanya perbedaan data pemohon di akta kelahiran dengan dokumen kependudukan lainnya.
                                                        Untuk contoh surat keterangan beda identitas , bisa di download dengan klik link berikut ini <a href="https://drive.google.com/file/d/1XEgaQ0gv-Vk_mpzBrVYfhK_HjZBEMs8W/view"> >>Link </a>
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="akta">akta kelahiran</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="akta" name="akta" value="">
                                                        <label class="custom-file-label" for="akta">Upload Akta Kelahiran..</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="sktm">surat keterangan tidak mampu</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="sktm" name="sktm" value="">
                                                        <label class="custom-file-label" for="kk">Upload sktm..</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="don_pen">Dokument Pendukung</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="don_pen" name="don_pen" value="">
                                                        <label class="custom-file-label" for="don_pen">Upload don_pen..</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ijazah">Ijazah Terakhir</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="ijazah" name="ijazah" value="">
                                                        <label class="custom-file-label" for="ijazah">Upload ijazah..</label>
                                                    </div>
                                                </div>
                                                <div class="alert alert-success" role="alert">
                                                    <p> Ijasah terakhir yang diupload adalah ijasah terakhir dengan data yang benar . Jika pemohon mengajukan perbaikan akta kelahiran untuk diri sendiri, maka ijasah yang diuplaod adalah ijasah pemohon.
                                                        Tapi jika pemohon mengajukan perbaikan akta kelahiran anaknya, yang diupload adalah ijasah anaknya

                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="skl">skl</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="skl" name="skl" value="">
                                                        <label class="custom-file-label" for="skl">Upload skl..</label>
                                                    </div>
                                                </div>





                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <!-- wizard 3 -->


                                <div class="tab-pane" id="dataLengkap">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Permohonan Lengkap</h4>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- button -->
                            <div class="wizard-footer height-wizard">
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1 mb-5">
                                        <div class="pull-right  ">
                                            <div class="d-flex justify-content-end">
                                                <input type='button' class=' btn btn-next btn-fill btn-primary btn-wd ' name='next' value='Next' />

                                                <div class="align-self-center mx-auto  ">
                                                    <button type="submit" name="tambah" class="btn btn-finish btn-fill btn-primary btn-wd">Ajukan Permohonan</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous  btn-default btn-wd '' name=' previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->







    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
            Made with <i class="fa fa-heart heart"></i> by <a>copyright klk 2 umj 2022</a>
        </div>
    </div>

    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!-- <script>
    $('.perkara').change(function() {
        var responseID = $(this).val();
        if (responseID == "Permohonan perbaikan nama") {
            $('#pDetails').removeClass("hidden");
            $('#pDetails').addClass("show");
        } else {
            $('#pDetails').removeClass("show");
            $('#pDetails').addClass("hidden");
        }
        console.log(responseID);
    });
</script> -->

<script>
    $('.perkara').change(function() {
        var responseID = $(this).val();
        if (responseID == "Permohonan perbaikan nama") {
            $('.kkDetails').addClass("hidden");
            $('.pDetails').removeClass("hidden");
            $('.pDetails').addClass("show");

        } else if (responseID == "Permohonan perwalian anak dibawah umur untuk jual beli") {
            $('.pDetails').addClass("hidden");
            $('.kkDetails').removeClass("hidden");
            $('.kkDetails').addClass("show");
        } else {
            $('.pDetails').addClass("hidden");
            $('.kkDetails').addClass("hidden");
            // $('#pDetails, kkDetails').removeClass("show");
            // $('#pDetails, kkDetails').addClass("hidden");
        }
    });

    const pesan = $('.pesan').data('flashdata');

    console.log(pesan);
    if (pesan) {
        Swal.fire({
            title: 'Selamat!',
            text: 'Data Anda akan diproses, admin akan menghungi Anda kembali',
            icon: 'success',
            confirmButtonText: 'OK'

        })
    }
</script>
=
<script>
    $('#akta, #ijazah, #ktp, #kk, #skbi, #sktm, #skl, #skl, #don_pen, #surat_nikah').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
<!-- lama -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</script>

<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src=" https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<script src="http://localhost/ptsp/assets/sweetalert/sweetalert.min.js"></script>


<script src="http://localhost/ptsp/assets/js/sweetalert2.all.min.js"></script>

<script src="http://localhost/ptsp/assets/js/ratify-upload.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="http://localhost/ptsp/assets/js/jsku.js"></script>





<!-- akhir lama -->


<!--   Core JS Files   -->
<script src=" http://localhost/ptsp/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src=" http://localhost/ptsp/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src=" http://localhost/ptsp/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src=" http://localhost/ptsp/assets/js/gsdk-bootstrap-wizard.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src=" http://localhost/ptsp/assets/js/jquery.validate.min.js"></script>



</html>



https://tilikdesa.pn-jember.go.id/form.html