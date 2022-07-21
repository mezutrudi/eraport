
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <!-- <b>Version</b> 3.1.0-rc -->
    </div>
    <strong>Copyright &copy; 2022. Tim IT <a href="https://smpti-alkautsar.sch.id/">SMPTIA</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url('public/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('public/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?=base_url('public/')?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url('public/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('public/')?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('public/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('public/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('public/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('public/')?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('public/')?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('public/')?>plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('public/')?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url('public/')?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url('public/')?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('public/')?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('public/')?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script><!-- Select2 -->
<script src="<?=base_url('public/')?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?=base_url('public/')?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url('public/')?>plugins/moment/moment.min.js"></script>
<script src="<?=base_url('public/')?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?=base_url('public/')?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?=base_url('public/')?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('public/')?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?=base_url('public/')?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?=base_url('public/')?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?=base_url('public/')?>plugins/dropzone/min/dropzone.min.js"></script>

<!-- <script src="<?=base_url('public/')?>plugins/sweetalert2/sweetalert2.min.js"></script> -->
<!-- Toastr -->
<script src="<?=base_url('public/')?>plugins/toastr/toastr.min.js"></script>
<script src="<?=base_url('public/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('public/')?>dist/js/demo.js"></script>
<script src="<?=base_url('public/')?>sweetalert/sweetalert2.all.min.js"></script>
<script src="<?=base_url('public/')?>ajax/custom.msg.js"></script>
<!-- <script src="<?=base_url('public/')?>ajax/style.js"></script> -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
        "scrollX": true
      // "buttons": ["excel", "pdf", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script>
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()
</script>
</body>
</html>