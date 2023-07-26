<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Transaction</title>

  <?php $this->load->view('css/style_transaksi_front')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <!-- <img class="animation__shake" src="<?//=base_url('asstes/dist/img/loadingicon.png')?>" alt="icon loading" height="auto"> -->
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
            <?php if ($this->session->flashdata('false')) {
                echo '<div class="alert alert-danger" style="font-size:12px" role="alert">'.$this->session->flashdata('false').'</div>';
            }?>
            </div><!-- /.col -->
            <div class="col-sm-8">
              <h1>Customer Transaction</h1>
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
                      <label>ID Customer</label>
                      <input class="form-control" type="text" placeholder="">
                      </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Nama Customer</label>
                      <input class="form-control" type="text" placeholder="">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Paket</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Healthy A</option>
                        <option>Healthy B</option>
                        <option>Healthy C</option>
                        <option>Dermalicious A</option>
                        <option>Dermalicious B</option>
                        <option>Dermalicious C</option>
                        <option>Dermalicious D</option>
                        <option>Dermalicious E</option>
                        <option>Slimming Starter</option>
                        <option>Slimming Premiere</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Jenis Paket</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Slimming</option>
                        <option>Healthy</option>
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
                      <label>Status Verifikasi</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Lunas</option>
                        <option>Belum Lunas</option>
                      </select>
                    </div>
                    <!-- /.form-group -->

                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Periode Paket</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">2 Minggu</option>
                        <option>1 Bulan</option>
                        <option>2 Bulan</option>
                      </select>

                    </div>
                    <!-- /.form-group -->
                    <!-- /.form-group -->
                  </div>
                </div>
                <!-- /.col -->
                <div class="row">
                  <div class="col-md-12 text-right">
                    <!-- <a href="customer-detail.html" button type="button" class="btn btn-warning">Back</button></a> -->
                    <a href="" button type="button" class="btn btn-primary">Tampilkan</button></a>
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
                <h3 class="card-title">Customer Transaction</h3>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="button-create">
                    <a class="btn btn-primary" href="<?=site_url('transaksi/create')?>" role="button" style="margin-top: 10px;"> <i class="fas fa-plus">
                    </i>
                    </a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="transaksi-table" class="table table-bordered table-hover">
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
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </section>
      <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_transaksi_front')?>
    <?php //$this->load->view('js/script_dashboard')?>

    <script type="text/javascript">
      var table;
      $(document).ready(function() {

          //datatables
          table = $('#transaksi-table').DataTable({

              "processing": true,
              "serverSide": true,
              "searching": false,
              // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
              // "searchDelay": 2000,
              // "order": [[5,'desc']],

              "ajax": {
                  "url": "<?=site_url('transaksi/list_transaksi')?>",
                  "type": "POST"
              },
              rowCallback: function ( row, data ) {
                // console.log(row);
                // if (moment(data.update_script, 'YYYY-MM-DD HH:mm:ss') < moment()) {
                //   $('td:eq(0)', row).css('background-color', ' rgba(255, 0, 0, 0.2)');
                //   $('td:eq(0)', row).css('color', 'blue');
                // } else {
                //   $('td:eq(0)', row).css('background-color', ''); 
                // }
              },

              "columnDefs": [
              {
                  "targets": [ 0 ],
                  "orderable": true,
              },
              ],

          });

      });

    </script>
</body>
</html>
