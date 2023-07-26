<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Order</title>
    <?php $this->load->view('css/style_transaksi_front')?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <!-- <img class="animation__shake" src="<?=base_url('assets/dist/img/loadingicon.png')?>" alt="icon loading" height="auto"> -->
    </div>

    <!-- Navbar -->
    <?php $this->load->view('navbar')?>
    <!-- /.navbar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-left : auto">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8">
              <h1>Blast Customer</h1>
            </div>
            <div class="col-sm-4">
              <div class="button-create">
                <a href="index.html" class="btn btn-primary" role="button" style="margin-left: -12px;"> <i
                    class="fas fa-reply">
                  </i>
                </a>
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID User</label>
                      <input class="form-control" type="text" placeholder="">
                      </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>ID Blast</label>
                      <input class="form-control" type="text" placeholder="">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Blast</label>
                      <div class="input-group date" id="tglblast" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#tglblast" />
                        <div class="input-group-append" data-target="#tglblast" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Jenis Paket</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Healthy</option>
                        <option>Slimming</option>
                        <option>Other</option>
                      </select>

                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Start Hold Date</label>
                      <div class="input-group date" id="tglstarthold" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#tglstarthold" />
                        <div class="input-group-append" data-target="#tglstarthold" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group"> -->
                    <!-- <label>Remarks</label> -->
                    <!-- <input class="form-control" type="text" row="3" placeholder=""> -->
                    <!-- </div> -->
                    <!-- /.form-group -->
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>End Hold Date</label>
                      <div class="input-group date" id="tglendhold" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#tglendhold" />
                        <div class="input-group-append" data-target="#tglendhold" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <!-- /.form-group -->
                    <!-- /.form-group -->

                  </div>
                </div>
                <!-- /.col -->
                <div class="row">
                  <div class="col-md-12 text-right">
                    <!-- <a href="customer-detail.html" button type="button" class="btn btn-warning">Back</button></a> -->
                    <a href="" button type="button" class="btn btn-primary">Search</button></a>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="row">
              <div class="col-12" style="padding: 20px;">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Blast Customer</h3>
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-append">
                          <a href="blast-customer-add.html" button type="submit" class="btn btn-primary"
                            data-toggle="tooltip" title="Create">
                            <i class="fas fa-plus"></i>
                            </button> </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>ID User</th>
                          <th>ID Blast</th>
                          <th>Tanggal Blast</th>
                          <th>Jenis Paket</th>
                          <th>Start Hold Date</th>
                          <th>End Hold Date</th>
                          <th>Remarks</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Del012</td>
                          <td>Blast001</td>
                          <td>31/05/2023</td>
                          <td>Slimming</td>
                          <td>01/06/2023</td>
                          <td>03/06/2023</td>
                          <td>Libur Nasional</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                  class="fas fa-eye"></i></a>
                              <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i
                                  class="fas fa-pencil-alt"></i></a>
                              <a href="#" Onclick="return ConfirmDelete();" type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal-sm"
                                title="Blast"><i class="fas fa-paper-plane"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                        </tr>
                        <tr>
                          <td>Del012</td>
                          <td>Blast001</td>
                          <td>31/05/2023</td>
                          <td>Slimming</td>
                          <td>01/06/2023</td>
                          <td>03/06/2023</td>
                          <td>Libur Nasional</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                  class="fas fa-eye"></i></a>
                              <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i
                                  class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-success" data-toggle="tooltip" title="Blast"><i
                                  class="fas fa-paper-plane"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Del012</td>
                          <td>Blast001</td>
                          <td>31/05/2023</td>
                          <td>Slimming</td>
                          <td>01/06/2023</td>
                          <td>03/06/2023</td>
                          <td>Libur Nasional</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                  class="fas fa-eye"></i></a>
                              <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i
                                  class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-success" data-toggle="tooltip" title="Blast"><i
                                  class="fas fa-paper-plane"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Del012</td>
                          <td>Blast001</td>
                          <td>31/05/2023</td>
                          <td>Slimming</td>
                          <td>01/06/2023</td>
                          <td>03/06/2023</td>
                          <td>Libur Nasional</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                  class="fas fa-eye"></i></a>
                              <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i
                                  class="fas fa-pencil-alt"></i></a><a href="#" class="btn btn-success"
                                data-toggle="tooltip" title="Blast"><i class="fas fa-paper-plane"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="modal fade" id="modal-sm">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Blast</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</sp an>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah anda yakin ingin mengirim whatsapp blast ?</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="blast-message.html" button type="button" class="btn btn-success">Blast Message</button></a>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

      </section>

    <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_transaksi_front')?>

 <!-- Page specific script -->
 <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });

        //Date picker
        $('#tglblast').datetimepicker({
          format: 'DD/MM/YYYY'
        });

        $('#tglstarthold').datetimepicker({
          format: 'DD/MM/YYYY'
        });

        $('#tglendhold').datetimepicker({
          format: 'DD/MM/YYYY'
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
      });

    </script>
</body>
</html>