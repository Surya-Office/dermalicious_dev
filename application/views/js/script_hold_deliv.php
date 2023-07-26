<script src="<?=site_url('assets/plugins/jquery/jquery.min.js')?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=site_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?=site_url('assets/plugins/sweetalert2/sweetalert2.min.js')?>"></script>
    <!-- Select2 -->
    <script src="<?=site_url('assets/plugins/select2/js/select2.full.min.js')?>"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?=site_url('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')?>"></script>
    <!-- InputMask -->
    <script src="<?=site_url('assets/plugins/moment/moment.min.js')?>"></script>
    <script src="<?=site_url('assets/plugins/inputmask/jquery.inputmask.min.js')?>"></script>
    <!-- date-range-picker -->
    <script src="<?=site_url('assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?=site_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
    <!-- Bootstrap Switch -->
    <script src="<?=site_url('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?=site_url('assets/dist/js/adminlte.min.js')?>"></script>
    <!-- Page specific script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        //Date picker
        $('#reservationdate').datetimepicker({
          format: 'DD-MM-YYYY'
        });

        $('#endholddelivery').datetimepicker({
          format: 'DD-MM-YYYY'
        });

        $('#restartdelivery').datetimepicker({
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
            format: 'MM/DD/YYYY hh:mm A'
          }
        })

        //Timepicker
        $('#timepicker').datetimepicker({
          format: 'LT'
        })

        //Tooltip
        $(document).ready(function () {
          $('[data-toggle="tooltip"]').tooltip();
        });

      })

    </script>