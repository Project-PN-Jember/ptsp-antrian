<!-- Custom styles for this page -->
<link href="<?= base_url('assets/sbadmin/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Page level plugins -->
<script src="<?= base_url('assets/sbadmin/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sbadmin/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>action/pemohon.js"></script>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex">
                <h6 class="m-0 font-weight-bold text-primary my-auto">Data Pengguna</h6>
                <div class="ml-auto">
                    <button type="button" class="btn btn-primary" onclick="reload_table()">Reload Data</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">#</th>
                            <th>Pemohon</th>
                            <th>NIK</th>
                            <th>Email</th>
                            <th>Klasifikasi Layanan</th>
                            <th width="110px">Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="showData">
                        <!-- Isi Data -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<!-- Modal Create Update -->
<div class="modal fade" id="actModal" data-backdrop="static" tabindex="-1" aria-labelledby="actModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Pemohon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" id="myForm" enctype="multipart/form-data" novalidate>
                <!-- nama, email, username, password, tanggal lahir, jenis kelamin, alamat, status, alamat, status, level -->
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="nama">Nama Pemohon</label>
                            <input type="text" minlength="8" class="form-control" id="nama" name="nama">
                            <input type="hidden" id="id" name="id">
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik">
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tempat_tinggal">Tempat Tinggal</label>
                            <input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal">
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="bank">Bank</label>
                            <select class="form-control" id="bank" name="bank">
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
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_rek">no_rek</label>
                            <input type="text" class="form-control" id="no_rek" name="no_rek">
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                        </div>



                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="akun_bank">akun_bank</label>
                            <input type="text" class="form-control" id="akun_bank" name="akun_bank">
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon">
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                        </div>

                    </div>


                    <!-- <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="permohonan">Upload Permohonan .docx</label>
                            <input type="file" class="form-control" id="permohonan" name="permohonan">
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="photo">Foto</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                            <div id="imgShow" class="d-flex justify-content-center"></div>
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                            <div class="invalid-feedback"> Tolong diisi :) </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="permohonan_bermaterai">Upload Permohonan bermaterai</label>
                            <input type="file" class="form-control" id="permohonan_bermaterai" name="permohonan_bermaterai">
                            <div class="valid-feedback">
                                Bagus!
                            </div>

                        </div>
                    </div> -->
                    <!-- <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="don_pen">Dokument pendukung tambahan</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                        </div>

                    </div> -->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSave" onclick="save()">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>