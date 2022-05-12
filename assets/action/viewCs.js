setInterval(function() {
  $('#jumlah-antrian').load('/ptsp/view/jumlah_antrian/'+id).fadeIn("slow");
  $('#antrian-sekarang').load('/ptsp/view/antrian_sekarang/'+id).fadeIn("slow");
  $('#antrian-selanjutnya').load('/ptsp/view/antrian_selanjutnya/'+id).fadeIn("slow");
  $('#sisa-antrian').load('/ptsp/view/sisa_antrian/'+id).fadeIn("slow");
  statusCs();
  // table.ajax.reload(null, false); //reload datatable ajax
}, 1000);

function statusCs() {
    // ajax lihat Status
    $.ajax({
        url : "/ptsp/view/statusCs/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            let stat = '';
            if(data.status == 'Online') {
                stat = `
                    <button type="button" class="btn btn-sm btn-success mx-auto">
                        Status <span class="badge badge-light">${data.status}</span>
                    </button>
                `;
            } else {
                stat = `
                    <button type="button" class="btn btn-sm btn-secondary mx-auto">
                        Status <span class="badge badge-light">${data.status}</span>
                    </button>
                `;
            }
            $('#CsStatus').html(stat);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // swal("Gagal!", "Gagal Menghubungi", "error"); // pesan gagal
            console.log('Gagal mengupdate Status')
        }
    });
}

function save() {
    event.preventDefault();
    $('#btnSave').text('Loading...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    let url, msgSuccess, msgError;
 
    url = "/ptsp/view/add_antrian/"+id;
    msgSuccess = "Antrian Berhasil Diambil";
    msgError = "Antrian Gagal Diambil";
    
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
            if(data.status) {
            	swal("Good job!", msgSuccess, "success"); // pesan berhasil
                const result = `<div class="card shadow mb-4">
                  <div class="card-body row">
                    <div class="col-md-4 mb-3 my-auto">
                      <div class="card text-center">
                        <div class="card-body">
                          <h5 class="card-title h5">No. Antrian</h5>
                          <p class="card-text font-weight-bold h1">${data.isi.no_antrian}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card">
                        <div class="card-header font-weight-bold">
                          <i class="fa-solid fa-user-astronaut"></i> | ${data.isi.nama}
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><i class="fa-solid fa-envelope-open"></i> | ${data.isi.email}</li>
                          <li class="list-group-item"><i class="fa-brands fa-whatsapp-square"></i> | ${data.isi.telp_wa}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>`;
                $('#form-antrian').html(result);
                console.log('ok');
            } else {
                $(".needs-validation").addClass('was-validated');
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
            // $('#myForm')[0].reset();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!", msgError, "error"); // pesan gagal
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        }
    });
}