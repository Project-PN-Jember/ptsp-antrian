<!-- Custom styles for this page -->
<link href="<?= base_url('assets/sbadmin/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Page level plugins -->
<script src="<?= base_url('assets/sbadmin/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sbadmin/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>action/user.js"></script>

	
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Management User</h1>
	</div>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="d-flex">
				<h6 class="m-0 font-weight-bold text-primary my-auto">Data Pengguna</h6>
				<div class="ml-auto">
					<button type="button" class="btn btn-primary add" onclick="add()">Tambah Data</button>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20px">#</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Username</th>
							<th>Jenis Kelamin</th>
							<th>Status</th>
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
        <h5 class="modal-title" id="titleModal">User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form class="needs-validation" id="myForm" enctype="multipart/form-data" novalidate>
		<!-- nama, email, username, password, tanggal lahir, jenis kelamin, alamat, status, alamat, status, level -->
      	<div class="modal-body">
		  <div class="form-row">
			<div class="col-md-6 mb-3">
			  <label for="nama">Nama Lengkap</label>
			  <input type="text" minlength="8" class="form-control" id="nama" name="nama" required>
			  <input type="hidden" id="idne" name="idne">
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi, mininal 8 karakter :) </div>
			</div>
			<div class="col-md-6 mb-3">
			  <label for="email">Email</label>
			  <input type="email" class="form-control" id="email" name="email" required>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi, dengan email yang benar :) </div>
			</div>
		  </div>
		  <div class="form-row">
			<div class="col-md-6 mb-3">
			  <label for="username">Username</label>
			  <input type="text" minlength="8" class="form-control" id="username" name="username" required>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi, mininal 8 karakter :) </div>
			</div>
			<div class="col-md-6 mb-3">
			  <label for="password">Password</label>
			  <input type="password" class="form-control" id="password" name="password" required>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi, minimal 8 karakter :) </div>
			</div>
		  </div>
		  <div class="form-row">
			<div class="col-md-6 mb-3">
			  <label for="tanggal_lahir">Tanggal Lahir</label>
			  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi. :) </div>
			</div>
			<div class="col-md-6 mb-3">
			  <label for="jenis_kelamin">Jenis Kelamin</label>
			  <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
				<option value="" selected>Pilih Jenis Kelamin</option>
				<option value="pria">Pria</option>
				<option value="wanita">Wanita</option>
			  </select>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi. :) </div>
			</div>
		  </div>
		  <div class="form-row">
			<div class="col-md-6 mb-3">
			  <label for="status">Status</label>
			  <select class="form-control" id="status" name="status" required>
				<option value="" selected>Pilih Status</option>
				<option value="Online">Online</option>
				<option value="Offline">Offline</option>
				<option value="Sedang Melayani">Sedang Melayani</option>
			  </select>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi. :) </div>
			</div>
			<div class="col-md-6 mb-3">
			  <label for="level">Level User</label>
			  <select class="form-control" id="level" name="level" required>
				<option value="" selected>Pilih Level User</option>
				<option value="cs perdata">cs perdata</option>
				<option value="cs pidana">cs pidana</option>
				<option value="cs umum">cs umum</option>
				<option value="cs hukum">cs hukum</option>
				<option value="cs posbakum">cs posbakum</option>
				<option value="admin">admin</option>
			  </select>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi. :) </div>
			</div>
		  </div>
		  <div class="form-row">
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
			  <label for="alamat">Alamat</label>
			  <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi. :) </div>
			</div>
		  </div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		  <button class="btn btn-primary" id="btnSave" onclick="save()">Simpan</button>
		</div>
	  </form>
    </div>
  </div>
</div>

<script type="text/javascript">
// Eksekusi Menampilkan Gambar yang dipilih
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            // $('#imgShow').attr('src', e.target.result);
            $('#imgShow').html(`<img src='${e.target.result}' height="100px" class="mt-2">`);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        $('#imgShow').html('');
    }
}

// Memanggil function Menampilkan Gambar yang dipilih
$('#photo').change(function() {
    readURL(this);
});
</script>