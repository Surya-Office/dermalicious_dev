<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harga Paket</title>
</head>
<body>

<?php $this->load->view('css/style_transaksi_front')?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

   <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=base_url('assets/dist/img/loadingicon.png')?>" alt="icon loading"
                height="auto">
        </div>

  <?php $this->load->view('navbar')?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left : auto">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8">
              <h1>Master Harga Paket</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
              <div class="button-create">
                <a href="<?=site_url('master/mastermenu')?>" class="btn btn-primary" role="button" style="margin-left: -12px;" title="Back"> <i
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
                      <label>ID Harga Paket</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Paket</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected"></option>
                        <option>Healthy</option>
                        <option>Slimming</option>
                        <option>Other</option>
                        <option>Slimming Staff</option>
                        <option>Healthy Doctor</option>
                        <option>Slimming Doctor</option>
                        <option>Staff</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Paket</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected"></option>
                        <option>Healthy A</option>
                        <option>Healthy B</option>
                        <option>Healthy C</option>
                        <option>Healthy D</option>
                        <option>Dermalicious A</option>
                        <option>Dermalicious B</option>
                        <option>Dermalicious C</option>
                        <option>Dermalicious D</option>
                        <option>Dermalicious E</option>
                        <option>Dermalicious F</option>
                        <option>Dermalicious Ruby</option>
                        <option>Dermalicious Saphire</option>
                        <option>Slimming Starter</option>
                        <option>Slimming Premiere</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Periode Paket</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected"></option>
                        <option>1 Minggu</option>
                        <option>2 Minggu</option>
                        <option>1 Bulan</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Waktu Paket</label>
                      <div class="form-group">
                        <div class="form-check">
                          <div class="row">
                            <div class="col-6">
                              <input class="form-check-input" type="radio" name="radio1">
                              <label class="form-check-label">Lunch or Dinner</label>
                            </div>
                            <div class="col-6">
                              <input class="form-check-input" type="radio" name="radio1">
                              <label class="form-check-label">Lunch and Dinner</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Harga</label>
                        <input class="form-control" type="text" id="dengan-rupiah" placeholder="Rp">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Diskon</label>
                      <input class="form-control" type="text" id="persen" placeholder="%">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Harga Setelah Diskon</label>
                      <input class="form-control" type="text" id="dengan-rupiahdis" placeholder="Rp">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12 text-right">
                    <!-- <a href="#" button type="button" class="btn btn-outline-success" -->
                    <!-- style="margin-right: 10px;">Back</button></a> -->
                    <a href="" button type="button" class="btn btn-primary">Search</button></a>
                  </div>
                </div>
              </div>
            </div><!-- /.card body -->

            <div class="row">
              <div class="col-12" style="padding: 20px;">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Master Harga Paket Detail</h3>
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-append">
                          <a href="<?=site_url('master/DataMaster/HargaPaketAdd')?>" class="btn btn-primary" data-toggle="tooltip" title="Create">
                            <i class="fas fa-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>ID Harga Paket</th>
                          <th>Jenis Paket</th>
                          <th>Kategori Paket</th>
                          <th>Periode Paket</th>
                          <th>Waktu Paket</th>
                          <th>Hari Paket</th>
                          <th>Harga</th>
                          <th>Diskon</th>
                          <th>Harga Setelah Diskon</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Healthy001</td>
                          <td>Healty</td>
                          <td>Healthy A</td>
                          <td>1 Minggu</td>
                          <td>Lunch or Dinner</td>
                          <td>Senin sd Jumat</td>
                          <td>Rp 387.500</td>
                          <td></td>
                          <td>Rp 387.500</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="msharga-paket-edit.html" class="btn btn-warning" data-toggle="tooltip"
                                title="Edit"><i class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                        </tr>
                        <tr>
                          <td>Healthy002</td>
                          <td>Healty</td>
                          <td>Healthy A</td>
                          <td>1 Minggu</td>
                          <td>Lunch and Dinner</td>
                          <td>Senin sd Jumat</td>
                          <td>Rp 775.000</td>
                          <td>5%</td>
                          <td>Rp 763.250</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i
                                  class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Healthy003</td>
                          <td>Healty</td>
                          <td>Healthy A</td>
                          <td>1 Minggu</td>
                          <td>Lunch or Dinner</td>
                          <td>Senin sd Sabtu</td>
                          <td>Rp 465.00</td>
                          <td></td>
                          <td>Rp 465.000</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i
                                  class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Healthy004</td>
                          <td>Healty</td>
                          <td>Healthy A</td>
                          <td>1 Minggu</td>
                          <td>Lunch and Dinner</td>
                          <td>Senin sd Sabtu</td>
                          <td>Rp 930.000</td>
                          <td>5%</td>
                          <td>Rp 883.500</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i
                                  class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
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
              "responsive": true,
              "autoWidth": false,
              // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
              // "searchDelay": 2000,
              // "order": [[5,'desc']],

            //   "ajax": {
            //       "url": "<?=site_url('transaksi/list_transaksi')?>",
            //       "type": "POST"
            //   },
            //   rowCallback: function ( row, data ) {
            //     // console.log(row);
            //     // if (moment(data.update_script, 'YYYY-MM-DD HH:mm:ss') < moment()) {
            //     //   $('td:eq(0)', row).css('background-color', ' rgba(255, 0, 0, 0.2)');
            //     //   $('td:eq(0)', row).css('color', 'blue');
            //     // } else {
            //     //   $('td:eq(0)', row).css('background-color', ''); 
            //     // }
            //   },

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