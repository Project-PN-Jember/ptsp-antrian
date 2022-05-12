'use strict';
let save_method; //for save method string
let table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#myTable').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "user/ajax_list",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });

});

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

 
function add() {
    save_method = 'add';
    $('#titleModal').text("Tambah Data User"); // tittle modal
    $('#myForm')[0].reset(); // reset form on modals
	$('#imgShow').html('');
    $('#alamat').text('');
    $(".needs-validation").removeClass('was-validated'); // clear error class
    $('#actModal').modal('show'); // show bootstrap modal
}
 
function edit(id) {
    save_method = 'update';
    $('#myForm')[0].reset(); // reset form on modals
	$('#imgShow').html('');
    $('#alamat').text('');
    $(".needs-validation").removeClass('was-validated'); // clear error class
 
    //Ajax Load data from ajax
    $.ajax({
        url : "user/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#idne').val(data.id);
            $('#nama').val(data.nama);
            $('#email').val(data.email);
            $('#username').val(data.username);
            // $('#password').val(data.password);
            $('#tanggal_lahir').val(data.tanggal_lahir);
            $('#jenis_kelamin').val(data.jenis_kelamin);
            $('#status').val(data.status);
            $('#level').val(data.level);
            $('#alamat').text(data.alamat);
            if (data.foto !== "") {
                $('#imgShow').html(`<img src='/ptsp/files/user/${data.foto}' height='100px' class='mt-2'>`);
            } else { $('#imgShow').html(''); }
            $('#actModal').modal('show'); // show bootstrap modal when complete loaded
            $('#titleModal').text("Edit Data User"); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!"," Data Gagal Ditampilkan", "error"); // pesan gagal
        }
    });
}

function save() {
    event.preventDefault();
    $('#btnSave').text('Loading...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    let url, msgSuccess, msgError;
 
    if(save_method == 'add') {
        url = "user/ajax_add";
        msgSuccess = "Data Berhasil Ditambahkan";
        msgError = "Data Gagal Ditambahkan";
    } else {
        url = "user/ajax_update";
        msgSuccess = "Data Berhasil Diubah";
        msgError = "Data Gagal Diubah";
    }
    
    var form = $('#myForm')[0];
    var data = new FormData(form);

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        // enctype: 'multipart/form-data',
        data: data,
        contentType: false,
        processData: false,
        dataType: "JSON",
        // cache: false,
        success: function(data)
        {
            if(data.status) { //if success close modal and reload ajax table
                $('#actModal').modal('hide');
            	swal("Good job!", msgSuccess, "success"); // pesan berhasil
                reload_table();
            } else {
                $(".needs-validation").addClass('was-validated');
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!", msgError, "error"); // pesan gagal
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}

function deleted(id) {
    if(confirm('Apakah anda yakin akan menghapus data ini?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "user/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                swal("Good job!", "Data Berhasil Dihapus", "success"); // pesan berhasil
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            	swal("Gagal!", "Data Gagal Dihapus", "error"); // pesan gagal
            }
        });
 
    }
}

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