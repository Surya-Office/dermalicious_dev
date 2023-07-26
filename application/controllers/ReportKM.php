<?php

class ReportKM extends CI_Controller 
{
    function __construct() {
        parent::__construct();
        $this->load->model('ReportKmModel');
    }

    function index() {
        $this->load->view('report/km');
    }

    function listJarak() {
        $post = $this->input->post();

        $report = $this->ReportKmModel->get_timeTable($post['tgl']);
        // var_dump($report);die;
        $no=1;
        echo '<table id="transaksi-table" class="table table-bordered table-hover">
        <tr>
          <td>Nama Driver</td>
          <td>:</td>
          <td></td>
        </tr>
        <tr>
          <td>Tujuan</td>
          <td>:</td>
          <td></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td>:</td>
          <td>'.date('l, d M Y', strtotime($post['tgl'])).'</td>
        </tr>
        <tr>
          <td>Waktu Berangkat</td>
          <td>:</td>
          <td></td>
        </tr>
        </table><br>';
        echo '<table id="transaksi-table" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Customer</th>
          <th>Periode</th>
          <th>Alamat Pengiriman</th>
          <th>No Telp.</th>
          <th>Jumlah Pesanan</th>
          <th>Jarak</th>
        </tr>
        </thead>
        <tbody>';
        if (!empty($report)) {
            foreach ($report as $key) {
                
                        echo '<tr>
                            <td>'.$no++.'</td>
                            <td>'.$key['nama_customer'].'</td>
                            <td>'.$key['paid_date'].'</td>
                            <td>'.$key['alamat_1'].'</td>
                            <td>'.$key['telepon_1'].'</td>
                            <td>'.$key['jenis_paket']." (".$key['lunch']." Lunch, ".$key['dinner'].' Dinner)</td>
                            <td>'.$key['km_1'].' Km</td>
                        </tr>';
                    // }
                }
            } else {
            echo '<tr>
            <td colspan=7><i>Tidak Ada Pengiriman</i></td></tr>';
        }
        
        echo '</tbody>
      </table>';

        // var_dump($report);die;
        // echo "test";
    }
}