<!-- Custom styles for this page -->
<link href="<?= base_url('assets/sbadmin/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Page level plugins -->
<script src="<?= base_url('assets/sbadmin/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sbadmin/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>action/notifikasi.js"></script>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20px">#</th>
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

<style>
  #myTable td {
    padding: 0px;
  }
</style>