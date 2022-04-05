function save() {
    event.preventDefault();
    $('#btnSave').text('Loading...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    let url, msgSuccess, msgError;
 
    url = "profile/ajax_update";
    msgSuccess = "Data Berhasil Diubah";
    msgError = "Data Gagal Diubah";
    
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
                updateUserDropdown(data.nameProfile, data.photoProfile);
            	swal("Good job!", msgSuccess, "success"); // pesan berhasil
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