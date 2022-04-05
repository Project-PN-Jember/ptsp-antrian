<script src="<?= base_url('assets/'); ?>action/profile.js"></script>

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
			</div>
		</div>
		<div class="card-body">

    <?php foreach($datadiri as $row): ?>
        <form class="needs-validation" id="myForm" enctype="multipart/form-data" novalidate>
		<!-- nama, email, username, password, tanggal lahir, jenis kelamin, alamat, status, alamat, status, level -->
      	<div class="modal-body">
		  <div class="form-row">
			<div class="col-md-6 mb-3">
			  <label for="nama">Nama Lengkap</label>
			  <input type="text" minlength="8" class="form-control" id="nama" name="nama" value="<?= $row->nama; ?>" required>
			  <input type="hidden" id="idne" name="idne">
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi, mininal 8 karakter :) </div>
			</div>
			<div class="col-md-6 mb-3">
			  <label for="email">Email</label>
			  <input type="email" class="form-control" id="email" name="email" value="<?= $row->email; ?>" required>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi, dengan email yang benar :) </div>
			</div>
		  </div>
		  <div class="form-row">
			<div class="col-md-6 mb-3">
			  <label for="username">Username</label>
			  <input type="text" minlength="8" class="form-control" id="username" name="username" value="<?= $row->username; ?>" required>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi, mininal 8 karakter :) </div>
			</div>
			<div class="col-md-6 mb-3">
			  <label for="password">Password</label>
			  <input type="password" class="form-control" id="password" name="password" value="<?= $row->password; ?>" required>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi, minimal 8 karakter :) </div>
			</div>
		  </div>
		  <div class="form-row">
			<div class="col-md-6 mb-3">
			  <label for="tanggal_lahir">Tanggal Lahir</label>
			  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $row->tanggal_lahir; ?>" required>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi. :) </div>
			</div>
			<div class="col-md-6 mb-3">
			  <label for="jenis_kelamin">Jenis Kelamin</label>
			  <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
				<option value="" selected>Pilih Jenis Kelamin</option>
				<option value="pria" <?= ($row->jenis_kelamin == 'pria') ? 'selected' : '' ; ?>>Pria</option>
				<option value="wanita" <?= ($row->jenis_kelamin == 'wanita') ? 'selected' : '' ; ?>>Wanita</option>
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
				<option value="Online" <?= ($row->status == 'Online') ? 'selected' : '' ; ?>>Online</option>
				<option value="Offline" <?= ($row->status == 'Offline') ? 'selected' : '' ; ?>>Offline</option>
				<!-- <option value="Sedang Melayani">Sedang Melayani</option> -->
			  </select>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi. :) </div>
			</div>
			<div class="col-md-6 mb-3">
			  <label for="level">Level User</label>
			  <input type="text" class="form-control" id="level" name="level" value="<?= $row->level; ?>" readonly required>
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
			  <div id="imgShow" class="d-flex justify-content-center">
                <img src="<?= base_url('files/user/') . $row->foto; ?>" height="100px" class="mt-2">
              </div>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi :) </div>
			</div>
			<div class="col-md-6 mb-3">
			  <label for="alamat">Alamat</label>
			  <textarea name="alamat" id="alamat" class="form-control" rows="3" required><?= $row->alamat; ?></textarea>
			  <div class="valid-feedback">
				Bagus!
			  </div>
			  <div class="invalid-feedback"> Tolong diisi. :) </div>
			</div>
		  </div>
		</div>
		<div class="modal-footer">
		  <a type="button" class="btn btn-secondary" href="<?= site_url('dashboard'); ?>">Batal</a>
		  <button class="btn btn-primary" id="btnSave" onclick="save()">Simpan</button>
		</div>
	    </form>
    <?php endforeach; ?>
		</div>
	</div>

</div>

<script>
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