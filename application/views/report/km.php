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
            <div class="col-sm-12">
            <?php if ($this->session->flashdata('success')) {
                echo '<div class="success alert-success" style="font-size:12px" role="alert">'.$this->session->flashdata('success').'</div>';
            }?>
            </div><!-- /.col -->
            <div class="col-sm-8">
              <h1>Delivery Order</h1>
            </div>
            <div class="col-sm-4">
              <div class="button-create">
                <a href="<?=site_url('dashboard/mainpackage')?>" class="btn btn-primary" role="button" style="margin-left: -12px;"> <i
                    class="fas fa-reply">
                  </i>
                </a>
              </div>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
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
                      <label>Tanggal Delivery</label>
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                            <input type="text" id="tgl-report" class="form-control datetimepicker-input" data-target="#reservationdate2" value="<?=date('d-m-Y')?>" />
                            <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!-- /.col -->
                  <!-- /.col -->
                </div>
                
                <div class="row">
                  <div class="col-md-12 text-right">
                    <!-- <a href="customer-detail.html" button type="button" class="btn btn-warning">Back</button></a> -->
                    <a id="tampil-report" type="button" onclick="tampilreport()" class="btn btn-primary">Search</a>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <h3 class="card-title">Delivery Order</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <div id="report"></div>
                <!-- <table id="transaksi-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>Brand</th>
                    <th>Klinik</th>
                    <th>ID Customer</th>
                    <th>Nama Customer</th>
                    <th>Status Verifikasi</th>
                    <th>Status Payment</th>
                    <th>Detail Paket</th>
                    <th>Tanggal Payment</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </section>
    </div>
    </div>
      <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_transaksi_front')?>
    
    <script>
        function tampilreport() {
            var tgl_report = $('#tgl-report').val();
            // alert(tgl_report);
            $.ajax({
            type: "POST",
            url: "<?=site_url('ReportKM/listJarak')?>",
            data: {
                tgl:tgl_report
            },
            success : function(response){
              // alert(JSON.parse(data).start_periode);
            //   alert(response);
              $('#report').html(response);
            }
          })
        }
    </script>

    <script>
      $(function () {
        //Initialize Select2 Elements
        
        $('#reservationdate2').datetimepicker({
          format: 'DD-MM-YYYY'
        });
      })

    </script>
</body>
</html>