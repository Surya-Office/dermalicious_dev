<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Transaction</title>

  <?php $this->load->view('css/style_create')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?//=base_url('asstes/dist/img/loadingicon.png')?>" alt="icon loading" height="auto">
    </div> -->

    <!-- Navbar -->
    <?php $this->load->view('navbar')?>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left : auto">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-4 mt-4">
            <div class="col-sm-12">
              <h1 style="text-align: center;">Customer Detail</h1>
            </div><!-- /.col -->
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
              <!-- <form action="<?//=site_url('transaksi/selectmenu')?>" method="post"> -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID User</label>
                      <label for="" class="form-control"><?=$transaksi->id_user?></label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status Paket</label>
                      <label for="" class="form-control"><?=$transaksi->status_paket?></label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label>New/Existing Customer*</label>
                      <label for="" class="form-control"><?=$transaksi->status_paket?></label>
                    </div>
                  </div> -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Transaksi</label>
                      <label for="" class="form-control"><?=$transaksi->id_transaksi?></label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Brand</label>
                      <label for="" class="form-control"><?=$transaksi->nama?></label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Klinik</label>
                      <label for="" class="form-control"><?=$transaksi->nama_klinik?></label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Customer</label>
                      <label for="" class="form-control"><?=$transaksi->id_customer?></label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Customer</label>
                      <label for="" class="form-control"><?=$transaksi->nama_customer?></label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomer Whatsapp<span style="color:red">*</span></label>
                      <label for="" class="form-control"><?=$transaksi->telepon_1?></label>
                      <!-- <input class="form-control" type="text" name="telp_1" maxlength="13" onkeypress="return hanyaAngka(event)" placeholder=""> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomer Telephone</label>
                      <label for="" class="form-control"><?=$transaksi->telepon_2?></label>
                      <!-- <input class="form-control" type="text" name="telp_2" maxlength="13" onkeypress="return hanyaAngka(event)" placeholder=""> -->
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Transaksi</label>
                      <label for="" class="form-control"><?=date('d M Y H:i', strtotime($transaksi->tgl_transaksi))?></label>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Pembayaran</label>
                      <label for="" class="form-control"><?=date('d M Y H:i', strtotime($transaksi->paid_date))?></label>
                    </div>
                    <!-- /.form-group -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status Pembayaran</label>
                      <label for="" class="form-control"><?=strtoupper($transaksi->status_payment)?></label>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <?php if ($this->session->userdata('level') == 'Finance') {?>
                    <?php if ($transaksi->status_veryfied == "not verified") {?>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Status Verifikasi</label>
                            <label for="" class="form-control"><?=$transaksi->status_veryfied?></label>
                            <!-- <select class="form-control select2" name="status_paket" style="width: 100%;">
                              <option value="<?//=$transaksi->status_veryfied?>"><?//=$transaksi->status_veryfied?></option>
                              <option value="verified">Verified</option>
                            </select> -->
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Verifikasi</label>
                            <form action="<?=site_url('transaksi/verified/'.$transaksi->id_transaksi)?>" method="post">
                                <input type="hidden" name="verifikasi" value="verified" id="">
                                <!-- <input type="hidden" name="id_trans" value="<?//=$transaksi->id_transaksi?>" id=""> -->
                                <button type="submit" class="form-control btn btn-primary">Verified</button>
                            </form>
                          </div>
                        </div>
                    <?php } else {?>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Status Verifikasi</label>
                            <label for="" class="form-control"><?=$transaksi->status_veryfied?></label>
                            <!-- <select class="form-control select2" name="status_paket" style="width: 100%;">
                              <option value="<?//=$transaksi->status_veryfied?>"><?//=$transaksi->status_veryfied?></option>
                              <option value="verified">Verified</option>
                            </select> -->
                          </div>
                        </div>
                    <?php }?>
                  <?php } else {?>
                    <div class="col-md-6">
                          <div class="form-group">
                            <label>Status Verifikasi</label>
                            <label for="" class="form-control"><?=$transaksi->status_veryfied?></label>
                            <!-- <select class="form-control select2" name="status_paket" style="width: 100%;">
                              <option value="<?//=$transaksi->status_veryfied?>"><?//=$transaksi->status_veryfied?></option>
                              <option value="verified">Verified</option>
                            </select> -->
                          </div>
                        </div>
                  <?php } ?>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Qty Total</label>
                      <label for="" class="form-control"><?=$qty_total?></label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Remarks</label>
                      <label for="" class="form-control"><?=$transaksi->notes?></label>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Detail Transaksi</h3>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="button-create">
                          <!-- <button type="submit" class="btn btn-primary" title="Add" style="margin-top: 10px;"> <i class="fas fa-plus">
                            </i>
                          </button> -->
                          <!-- <a href="<?=site_url('transaksi/selectmenu')?>" id="datacust" class="btn btn-primary" title="Add" role="button" style="margin-top: 10px;"><i class="fas fa-plus"></i></a> -->
                        </div>
                      </div>
                    </div>
                    <!-- </form> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>ID Detail Transaksi</th>
                            <th>Kategori Paket</th>
                            <th>Jenis Paket</th>
                            <th>Waktu Paket</th>
                            <th>Qty Paket</th>
                            <th>Periode Paket</th>
                            <th>Detail Paket</th>
                            <!-- <th>Status Pembayaran</th> -->
                            <!-- <th>Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          
                          <?php foreach ($detail_transaksi as $key) {?>
                            <tr>
                            <td><?=$key['id_transaksi_detail']?></td>
                            <td><?=$key['kategori_paket']?></td>
                            <td><?=$key['jenis_paket']?></td>
                            <td><?=$key['waktu_paket']?></td>
                            <td><?=$key['qty_pemesanan']?></td>
                            <td><?=$key['periode_paket']?></td>
                            <td><?=$key['detail_paket']?></td>
                            <!-- <td> Lunas</td> -->
                            <!-- <td>
                              <div class="btn-group btn-group-xs">
                                <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                    class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Create"><i
                                    class="fas fa-pencil-alt"></i></a>
                                <a href="<?//=site_url('transaksi/removefromcart/'.$key['rowid'])?>" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                    class="fas fa-trash"></i></a>
                              </div> -->
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
              <hr>
              <!-- stop delivery form -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Stop Delivery</h3>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="button-create">
                          <a class="btn btn-primary" data-toggle="tooltip" title="Add" href="stop-delivery.html" role="button"
                            style="margin-top: 10px;"> <i class="fas fa-plus">
                            </i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>ID Transaksi</th>
                            <th>Start Hold</th>
                            <th>End Hold Delivery</th>
                            <th>Start Delivery</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan="6"><i> Tidak Ada Data</i></td>
                          </tr>
                          <!-- <tr>
                            <td>Del001</td>
                            <td>dd/mm/yyyy</td>
                            <td>dd/mm/yyyy</td>
                            <td>dd/mm/yyyy</td>
                            <td>Isi keterangan</td>
                            <td>
                              <div class="btn-group btn-group-xs">
                                <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                    class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Create"><i
                                    class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                    class="fas fa-trash"></i></a>
                              </div>
                          </tr>
                          <tr>
                            <td>Del001</td>
                            <td>dd/mm/yyyy</td>
                            <td>dd/mm/yyyy</td>
                            <td>dd/mm/yyyy</td>
                            <td>Isi keterangan</td>
                            <td>
                              <div class="btn-group btn-group-xs">
                                <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                    class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Create"><i
                                    class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                    class="fas fa-trash"></i></a>
                              </div>
                            </td>
                          </tr> -->
                        </tbody>
                      </table>
                    </div>
                  </div> <!-- div close tabel stop delivery -->
                  <hr>
                  <div class="row">
                    <div class="col-12">
                      <div class="btn btn-group pull-right">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="btn btn-group">
                              <a href="customer-transaction.html"><button type="button" class="btn btn-warning">Back</button></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="btn btn-group">
                            <a href="<?=site_url('transaksi/insert_trans')?>" type="button" class="btn btn-success">Save</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- </form> -->
            </div>
          </div>
        </div> <!-- close div container fluid -->



        <!-- /.modal detail paket-->
        <div class="modal fade" id="modal-lg">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Create Detail Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ID Transaksi</label>
                        <input class="form-control" disabled="disabled" type="text" placeholder="Generated by system">
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Kategori Paket</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option selected="selected">Healthy A</option>
                          <option>Healthy B</option>
                          <option>Healthy C</option>
                        </select>
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
                      <div class="form-group">
                        <label>Waktu Paket</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option selected="selected">Lunch</option>
                          <option>Dinner</option>
                          <option>Lunch - Dinner</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Qty Paket</label>
                        <input class="form-control" type="text" placeholder="Pack..">
                      </div>
                      <div class="form-group">
                        <label>Periode Paket</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option selected="selected">2 Minggu</option>
                          <option>1 Bulan</option>
                          <option>2 Bulan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Detail Paket</label>
                        <input class="form-control" type="text" placeholder="Detail paket yang dipesan">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.close div modal detail transaksi -->
      </section>
    <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_create')?>
    
    <script>
  		function hanyaAngka(evt) {
  		  var charCode = (evt.which) ? evt.which : event.keyCode
  		   if (charCode > 31 && (charCode < 48 || charCode > 57))

  		    return false;
  		  return true;
  		}
  	</script>

    <script>
      // var form = document.getElementById("user");
      // document.getElementById("datacust").addEventListener("click", function () {
      //   console.log(form.submit());
      //   // form.submit();
      // });

    </script>
    <script>
      $(document).ready(function(){
        $('#perusahaan').change(function(){
          var perusahaan = $(this).val();
          $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getklinik')?>",
            data: {
              perusahaan:perusahaan
            },
            success : function(response){
              // alert(response);
              $('#klinik').html(response);
              $('#klinik').selectpicker('refresh');
            }
          })
        })
      })
    </script>
</body>
</html>
