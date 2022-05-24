'use strict';
let save_method; //for save method string
let table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#myTable').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "searching": false, //set not searching
        "bPaginate": true, //set not paging
        "lengthChange": false, //set not lengthChange
        "bInfo": false, //set not info
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "notifikasi/ajax_list",
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

    $('#myTable thead').hide();
    $('#myTable tbody').css('padding', '0');

});


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}