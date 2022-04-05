        </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PTSP PN JEMBER - 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih tombol Logout jika yakin untuk meninggalkan halaman.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/sbadmin/'); ?>js/sb-admin-2.js"></script>
<script>
  // setInterval(function() {
    getStatus();
    // updateUserDropdown()
  // }, 1000);

  function getStatus() {
    // ajax hubungi pemohon
    $.ajax({
        url : "dashboard/getStatus",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#labelCustomStatus').text(data.status)
            if(data.status == 'Online') {
              $("#customStatus").prop("checked", true);
            } else {
              $("#customStatus").prop("checked", false);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!", "Gagal Custom Status", "error"); // pesan gagal
        }
    });
  }

  $('#customStatus').click(function(){
      $.ajax({
        url : "dashboard/customStatus",
        type: "POST",
        data: {statusLayanan: $('#labelCustomStatus').html()},
        dataType: "JSON",
        success: function(data)
        {
          getStatus();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal("Gagal!", "Gagal Custom Status", "error"); // pesan gagal
          }
      });
  }); 

   $('#profile').click(function(){
    $('#p-actModal').modal('show');
   });
</script>
</html>