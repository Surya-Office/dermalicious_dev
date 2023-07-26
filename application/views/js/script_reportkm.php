<!-- jQuery -->
<script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?=base_url('assets/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- daterangepicker -->
    <script src="<?=base_url('assets/plugins/moment/moment.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?=base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
    <!-- Summernote -->
    <script src="<?=base_url('assets/plugins/summernote/summernote-bs4.min.js')?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?=base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/dist/js/adminlte.js')?>"></script>
    <!-- AdminLTE for demo purposes
<script src="dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?=base_url('assets/dist/js/pages/dashboard.js')?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/jszip/jszip.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/pdfmake/pdfmake.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/pdfmake/vfs_fonts.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
    <script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
    <!-- Page specific script -->
    <!-- <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      //   $('.datatable').DataTable({
      //     "paging": true,
      //     "lengthChange": false,
      //     "searching": false,
      //     "ordering": true,
      //     "info": true,
      //     "autoWidth": false,
      //     "responsive": true,
      //   });
      });
    </script> -->
    <!-- Modal Pop Up-->
    <script>
      $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
      })
    </script>

<script>
      $(function () {
        
        //Date picker
        $('#reservationdate').datetimepicker({
          format: 'DD-MM-YYYY'
        });

        $('#reservationdate2').datetimepicker({
          format: 'DD-MM-YYYY'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
          icons: {
            time: 'far fa-clock'
          }
        });

        //Date range picker
        $('#reservation').daterangepicker()

        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'DD/MM/YYYY hh:mm A'
          }
        })

        //Timepicker
        $('#timepicker').datetimepicker({
          format: 'HH:mm'
        })

        $('#timepicker2').datetimepicker({
          format: 'HH:mm'
        })

        //Tooltip
        $(document).ready(function () {
          $('[data-toggle="tooltip"]').tooltip();
        });

      })

    </script>

