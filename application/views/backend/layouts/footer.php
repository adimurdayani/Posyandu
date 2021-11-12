<!-- Footer Start -->
<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <script>
        document.write(new Date().getFullYear())
        </script> &copy; E-Posyandu Kecamatan Mungkajang
      </div>
    </div>
  </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="<?= base_url()?>assets/js/vendor.min.js"></script>

<!-- third party js -->
<script src="<?= base_url()?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

<!-- Plugins js-->
<script src="<?= base_url()?>assets/libs/parsleyjs/parsley.min.js"></script>

<!-- Datatables init -->
<!-- <script src="<?= base_url()?>assets/js/pages/datatables.init.js"></script> -->

<!-- Dashboar 1 init js-->
<script src="<?= base_url()?>assets/js/pages/dashboard-1.init.js"></script>

<!-- App js-->
<script src="<?= base_url()?>assets/js/app.min.js"></script>

<script>
$(document).ready(function() {
  $("#scroll-horizontal-datatable").DataTable({
    scrollX: !0,
    language: {
      paginate: {
        previous: "<i class='mdi mdi-chevron-left'>",
        next: "<i class='mdi mdi-chevron-right'>"
      }
    },
    drawCallback: function() {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
    }
  })
})

// validasi
$(document).ready(function() {
  $(".parsley-examples").parsley()
})
</script>

<script>
$(document).ready(function() {

  setInterval(function() {
    $.ajax({
      url: "<?= base_url('dashboard/notifikasi')?>",
      type: "POST",
      dataType: "json",
      data: {},
      success: function(data) {
        $("#total-notifikasi").html(data.total_registrasi);
        $("#nama").html(data.nama);
        $("#tanggal").html(data.tanggal);
        $("#pesan").html(data.msg);
      }
    });
  }, 1000)

})
</script>

</body>

</html>