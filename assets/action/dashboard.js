'use strict';
let save_method; //for save method string
let table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#myTable').DataTable({ 
 
        // "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "dashboard/ajax_list",
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

setInterval(function() {
    $('#jumlah-antrian').load('dashboard/jumlah_antrian').fadeIn("slow");
    $('#antrian-sekarang').load('dashboard/antrian_sekarang').fadeIn("slow");
    $('#antrian-selanjutnya').load('dashboard/antrian_selanjutnya').fadeIn("slow");
    $('#sisa-antrian').load('dashboard/sisa_antrian').fadeIn("slow");
    table.ajax.reload(null, false); //reload datatable ajax
}, 1000);


function hubungi(id) {
    // ajax hubungi pemohon
    $.ajax({
        url : "dashboard/hubungi/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            console.log('200 Ok')
            table.ajax.reload(null, false);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!", "Gagal Menghubungi", "error"); // pesan gagal
        }
    });
}