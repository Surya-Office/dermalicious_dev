<?php

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('aksesmodel');
        $this->load->model('transaksimodel');
        if ($this->session->userdata('id_user') == null ) {
            redirect('login/logout');
        }
    }

    public function index()
    {
        $data_cust = array(
            'id_cust', 'nama_cust', 'id_brand', 'id_klinik', 'telp_1', 'telp_2', 'tgl_trans', 'waktu_trans', 'tgl_pembayaran', 'waktu_pembayaran', 'status_paket',
        );
        $test = $this->session->unset_userdata($data_cust);
        // var_dump($test);exit;
        $this->cart->destroy();
        $this->load->view('transaksi/front');
    }

    public function create()
    {
        $id_role = $this->session->userdata('role');
        $method = $this->router->fetch_method();
        $class = $this->router->fetch_class();
        // $get_akses = $this->aksesmodel->getakses($id_role, $class."/".$method);

        // if ($get_akses->create == "false") {
        //     $this->session->set_flashdata('false', 'Anda tidak memiliki askes untuk ke halaman selanjutnya');
        //     redirect($class);
        // }
        $cart = $this->cart->contents();
        $qty_total=0;
        foreach ($cart as $key) {
            $qty_total = $key['qty_paket'];
        }

        $data['qty_total'] = $qty_total;
        $data['cart'] = $this->cart->contents();
        // $klinik = $this->transaksimodell->getklinik()
        // var_dump($data);die;
        $this->load->view('transaksi/create', $data);
    }

    public function getKlinik()
    {
        $id_perusahaan = $this->input->post('perusahaan');
        $option = $this->transaksimodel->getklinik($id_perusahaan);
        echo '<option value="">- Pilih Klinik -</option>';
        foreach ($option as $opt)
        {
            echo '<option value="' . $opt['id_klinik'] . '">' . $opt['nama_klinik'] . '</option>';
        }
    }

    public function selectMenu()
    {
        $post = $this->input->post();
        
        $nama_klinik = "";
        if (!empty($this->input->post('id_klinik'))) {
            $nama_klinik = $this->transaksimodel->getnamaklinik($post['id_klinik'])->nama_klinik;
        }
        $tgl_trans = "";
        $tgl_pembayaran = "";
        if ($post['tgl_trans'] == null) {
            $tgl_trans = date('d-m-Y');
        } else {
            $tgl_trans = $post['tgl_trans'];
        }
        if ($post['tgl_pembayaran'] == null) {
            $tgl_pembayaran = date('d-m-Y');
        } else {
            $tgl_pembayaran = $post['tgl_pembayaran'];
        }

        $data = array();
        $date_paid = date('Y-m-d', strtotime($tgl_pembayaran));
        $time_paid = date("H:i", strtotime($post['waktu_pembayaran']));
        $libur = $this->db->select('date_holiday')->where('date_holiday >=', $date_paid)->get('ms_holiday')->result_array();
        // var_dump($libur);exit;
        if ($time_paid >= "18:00") {
            $start_date = date('Y-m-d', strtotime($date_paid. '+ 3 days'));
            $date = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
            if ($date > 0) {
                $data['start_date_periode'] = date('Y-m-d', strtotime($start_date. '+ 1 days'));
            } else {
                $data['start_date_periode'] = $start_date;
            }
        } else {
            $start_date = date('Y-m-d', strtotime($date_paid. '+ 2 days'));
            $start_date_paket = "";
            $date = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
            if ($date > 0) {
                $data['start_date_periode'] = date('Y-m-d', strtotime($start_date. '+ 1 days'));
            } else {
                $data['start_date_periode'] = $start_date;
            }
        }

        // Var_dump($data);exit;
        $data_cust = array(
            'id_cust' => $this->input->post('id_customer'),
            'nama_cust' => $this->input->post('nama_customer'),
            'id_brand' => $this->input->post('brand'),
            'id_klinik' => $this->input->post('id_klinik'),
            'nama_klinik' => $nama_klinik,
            'telp_1' => $this->input->post('telp_1'),
            'telp_2' => $this->input->post('telp_2'),
            'status_paket' => $this->input->post('status_paket'),
            'tgl_trans' => $tgl_trans,
            'waktu_trans' => $this->input->post('waktu_trans'),
            'tgl_pembayaran' => $tgl_pembayaran,
            'waktu_pembayaran' => $this->input->post('waktu_pembayaran'),
        );
        $session = $this->session->set_userdata($data_cust);
        // $this->cart->insert()
        $data['jenis_paket'] = $this->transaksimodel->getJenisPaket();
        $data['kota'] = $this->transaksimodel->getCities();
        $data['kota2'] = $this->transaksimodel->getCities();
        $data['kota3'] = $this->transaksimodel->getCities();
        // $data['start_date_periode'] = $start_date;

        $this->load->view('transaksi/menu_paket', $data);
    }

    public function getKategori()
    {
        $id_jenis = $this->input->post('id_jenis_perusahaan');
        $option = $this->transaksimodel->getKategoriPaket($id_jenis);
        // var_dump($id_jenis);exit;
        echo '<option value="">-- Pilih Kategori Paket --</option>';
        foreach ($option as $opt)
        {
            echo '<option value="' . $opt['id_kategori_paket'] . '">' . $opt['kategori_paket'] . '</option>';
        }
    }

    public function getDistricts()
    {
        $id_city = $this->input->post('id_kota');
        $option = $this->transaksimodel->getDistricts($id_city);
        // var_dump($option);exit;
        echo '<option value="">-- Pilih Kecamatan --</option>';
        foreach ($option as $opt)
        {
            echo '<option value="' . $opt['dis_id'] . '">' . $opt['dis_name'] . '</option>';
        }
    }

    public function getSubDistricts()
    {
        $id_kecamatan = $this->input->post('id_kecamatan');
        $option = $this->transaksimodel->getSubDistricts($id_kecamatan);
        // var_dump($option);exit;
        echo '<option value="">-- Pilih Kelurahan --</option>';
        foreach ($option as $opt)
        {
            echo '<option value="' . $opt['subdis_id'] . '">' . $opt['subdis_name'] . '</option>';
        }
    }

    public function getPostCode()
    {
        $id_kelurahan = $this->input->post("id_keluarahan");
        $option = $this->transaksimodel->getPostCode($id_kelurahan);
        // var_dump($option->postal_code);exit;
        // json_decode($option);
        // echo '<option value="">-- Pilih Kelurahan --</option>';
        // foreach ($option as $opt)
        // {
            echo $option->postal_code;
        // }
    }

    public function addToCart()
    {
        $post = $this->input->post();
        // var_dump($post);exit;
        $jenis_paket = $this->transaksimodel->getnamajenis($post['jenis_paket']);
        $kategori_paket = $this->transaksimodel->getnamakatagori($post['kategori_paket']);

        if ($post['kota_1'] == "") {
            $alamat_1 = $post['alamat_1'];
        } else {
            $alamat_1 = $post['alamat_1'].", ".$post['kelurahan_1'].", ".$post['kecamatan_1'].", ".$post['kota_1'];
        }
        if ($post['kota_2'] == "") {
            $alamat_2 = $post['alamat_2'];
        } else {
            $alamat_2 = $post['alamat_2'].", ".$post['kelurahan_2'].", ".$post['kecamatan_2'].", ".$post['kota_2'];
        }
        if ($post['kota_3'] == "") {
            $alamat_3 = $post['alamat_3'];
        } else {
            $alamat_3 = $post['alamat_3'].", ".$post['kelurahan_3'].", ".$post['kecamatan_3'].", ".$post['kota_3'];
        }
        $km1 = $this->transaksimodel->getKM($alamat_1);
        $km2 = $this->transaksimodel->getKM($alamat_2);
        $km3 = $this->transaksimodel->getKM($alamat_3);

        $jadwal_pengiriman =  implode(', ', $post['days']); 
        // var_dump($jadwal_pengiriman);exit;
        // if ($post['kota_1']) {
        //     # code...
        // }
        // $getKM = $this->transactionmodel->getkm($post)
        // var_dump($jadwal_pengiriman);exit;
        $data= array(
            'id' => $post['jenis_paket']."-".$post['kategori_paket'],
            'name' => $post['nama_barang'],
            'jenis_paket' => $jenis_paket->jenis_paket,
            'kategori_paket' => $kategori_paket->kategori_paket,
            'waktu_paket' => $post['waktu_paket'],
            'periode_paket' => $post['periode_paket'],
            'qty' => 1,
            'price' => 20000,
            'qty_paket' => $post['qty_paket'],
            'detail_paket' => $post['detail_paket'],
            'riwayat_alergi' => $post['riwayat_alergi'],
            'jadwal_pengiriman' => $jadwal_pengiriman,
            'start_date_paket' => $post['start_date_periode'],
            'end_date_paket' => $post['end_date_periode'],
            'deskripsi' => $post['deskripsi'],

            'detail_alamat' => array(
                'alamat_1' => $post['alamat_1'],
                'kelurahan_1' => $post['kelurahan_1'],
                'kecamatan_1' => $post['kecamatan_1'],
                'kota_1' => $post['kota_1'],
                'linkmaps_1' => $post['linkmaps_1'],
                'km_1' => $km1,
                'notepengiriman_1' => $post['notepengiriman_1'],
                
                'alamat_2' => $post['alamat_2'],
                'kelurahan_2' => $post['kelurahan_2'],
                'kecamatan_2' => $post['kecamatan_2'],
                'kota_2' => $post['kota_2'],
                'linkmaps_2' => $post['linkmaps_2'],
                'km_2' => $km2,
                'notepengiriman_2' => $post['notepengiriman_2'],
                
                'alamat_3' => $post['alamat_3'],
                'kelurahan_3' => $post['kelurahan_3'],
                'kecamatan_3' => $post['kecamatan_3'],
                'kota_3' => $post['kota_3'],
                'km_3' => $km3,
                'linkmaps_3' => $post['linkmaps_3'],
                'notepengiriman_3' => $post['notepengiriman_3'],
            ),
        );
        // $this->cart->insert($data);
        $this->cart->insert($data);
        // $cart = $this->cart->contents();
        // var_dump($cart);exit;

        redirect('transaksi/create');
    }

    public function insert_trans()
    {
        $cart = $this->cart->contents();
        $qty_total=0;
        $check_cust = $this->transaksimodel->cekcust($this->session->userdata('id_cust'));
        // for ($i=0; $i < count($cart) ; $i++) { 
        //     $total_detail_paket = $cart[$i]['detail_paket'];
        // }
        foreach ($cart as $key) {
            $qty_total += $key['qty_paket'];
            
            $detailpaket[] = array(
                'total_detail_paket' =>$key['detail_paket']
                );
        }
        
        $id_trans = $this->transaksimodel->getidtrans();
        if (!empty($id_trans)) {
            $id_trans = $id_trans->id_transaksi + 1;
        } else {
            $id_trans = 1;
        }
        // var_dump($cart);exit;
        
        if (empty($check_cust)) {
            $insert_cust = $this->transaksimodel->insertcust();
            $insert_invoice = $this->transaksimodel->insertinvoice($qty_total, $detailpaket, $id_trans);
            $insert_detail_inv = $this->transaksimodel->insertdetailinvoice($id_trans);
            // var_dump($insert_detail_inv);exit;

            redirect('transaksi');
        } else {
            $insert_invoice = $this->transaksimodel->insertinvoice($qty_total, $detailpaket, $id_trans);
            $insert_detail_inv = $this->transaksimodel->insertdetailinvoice($id_trans);
            redirect('transaksi');
        }

    }

    public function getEndPeriode()
    {
        $post = $this->input->post();

        $date_end = "";
        $date_start = date('Y-m-d', strtotime($post['start_date_periode']));
        if ($post['periode'] == '2 Minggu') {
            $date_end = date('Y-m-d', strtotime($date_start. '+ 11 days'));
        } elseif ($post['periode'] == '1 Bulan') {
            $date_end = date('Y-m-d', strtotime($date_start. '+ 23 days'));
        } elseif ($post['periode'] == '2 Bulan') {
            $date_end = date('Y-m-d', strtotime($date_start. '+ 47 days'));
        }
        // $n
        // $libur = $this->db->select('date_holiday')->where('date_holiday >=', $date_start)->get('ms_holiday')->result_array();
        $libur = $this->db->select('date_holiday')->get('ms_holiday')->result_array();

        $array_date = array();
        $interval = new DateInterval('P1D');
    
        $realEnd = new DateTime($date_end);
        $realEnd->add($interval);
        // var_dump($realEnd);exit;
    
        $period = new DatePeriod(new DateTime($date_start), $interval, $realEnd);
    
        foreach($period as $date) {
            $array_date[] = $date->format('Y-m-d');
        }
        $array_holiday = array();
        foreach ($libur as $key) {
            $array_holiday[] = $key['date_holiday'];
        }
        for ($i=0; $i < count($array_date) ; $i++) { 
            if (in_array($array_date[$i],$array_holiday)) {
                // $start_date = date('Y-m-d', strtotime($start_date. '+ 1 days'));
                $date_end = date('Y-m-d', strtotime($date_end. '+ 1 days'));
                // $array_date[] = date('Y-m-d', strtotime($date_end));
            }
        }
        // var_dump($date_end);exit;
        $date_end_periode = date('d-m-Y', strtotime($date_end));
        echo $date_end_periode;
    }

    public function removeFromCart($id)
    {
        $del = $this->cart->remove($id);
        // var_dump($del);die;
        redirect('transaksi/create');
    }

    public function list_transaksi()
    {
        // header('Content-Type: application/json');
        $list = $this->transaksimodel->get_datatables();
        // var_dump($list);die;
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $transaksi) {
            $no++;
            $row = array();
            //row pertama akan kita gunakan untuk btn edit dan delete
            // $row[] =  '<a class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>
            // <a class="btn btn-danger btn-sm "><i class="fa fa-trash"></i> </a>';
            $hour_24 = date('Y-m-d H:i',strtotime($transaksi['updated_at']. '+24 hours'));
            
            if (!empty($transaksi['updated_at'])) {
                // $row[] = "test";
                $row[] = $transaksi['id_transaksi'];
                $row[] = $transaksi['nama_brand'];
                $row[] = $transaksi['nama_klinik'];
                $row[] = $transaksi['id_customer'];
                $row[] = $transaksi['nama_customer'];
                $row[] = strtoupper($transaksi['status_veryfied']);
                $row[] = strtoupper($transaksi['status_payment']);
                $row[] = date('d-M-Y H:i',strtotime($transaksi['paid_date']));
                $row[] = $transaksi['total_detail_paket'];
                $row[] = "<a href='".site_url('transaksi/detailtransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-info'><i class='fas fa-eye'></i></a>
                          <a href='".site_url('transaksi/edittransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-warning'><i class='fas fa-pencil-alt'></i></a>
                          <a href='#' class='btn btn-danger'><i class='fas fa-trash'></i></a>";
            } else {
                $row[] = $transaksi['id_transaksi'];
                $row[] = $transaksi['nama_brand'];
                $row[] = $transaksi['nama_klinik'];
                $row[] = $transaksi['id_customer'];
                $row[] = $transaksi['nama_customer'];
                $row[] = strtoupper($transaksi['status_veryfied']);
                $row[] = strtoupper($transaksi['status_payment']);
                $row[] = date('d-M-Y H:i',strtotime($transaksi['paid_date']));
                $row[] = $transaksi['total_detail_paket'];
                $row[] = "<a href='".site_url('transaksi/detailtransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-info'><i class='fas fa-eye'></i></a>
                          <a href='".site_url('transaksi/edittransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-warning'><i class='fas fa-pencil-alt'></i></a>
                          <a href='#' class='btn btn-danger'><i class='fas fa-trash'></i></a>";
                # code...
            }
            // var_dump($hour_24);die;
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->transaksimodel->count_all(),
            "recordsFiltered" => $this->transaksimodel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    public function detailTransaksi($id)
    {
        $data['transaksi'] = $this->transaksimodel->gettransaksi($id);
        $data['detail_transaksi'] = $this->transaksimodel->getdetailtransaksi($id);

        $qty_total = 0;
        foreach ($data['detail_transaksi'] as $key ) {
            $qty_total += $key['qty_pemesanan'];
        }
        $data['qty_total'] = $qty_total;
        
        // var_dump($data);die;
        $this->load->view('transaksi/detail_trans', $data);
    }

    public function verified($id_trans)
    {
        $post = $this->input->post('verifikasi');

        $verif = $this->db->query("UPDATE tbl_transaksi SET status_veryfied = '$post' WHERE id_transaksi = $id_trans");
        
        
        if ($verif == true) {
            $transaksi = $this->transaksimodel->gettransaksi($id_trans);
            $detail_transaksi = $this->transaksimodel->getdetailtransaksi($id_trans);

            foreach ($detail_transaksi as $detail_transaksi) {
                $date_start = $detail_transaksi['start_date_periode_paket'];
                $libur = $this->db->select('date_holiday')->get_where('ms_holiday', ['date_holiday >=' => $detail_transaksi['start_date_periode_paket']])->result_array();
                # code...
                $array_date = array();

                $interval = new DateInterval('P1D');
    
                $realEnd = new DateTime($detail_transaksi['end_date_periode_paket']);
                $realEnd->add($interval);

                $period = new DatePeriod(new DateTime($date_start), $interval, $realEnd);

                foreach($period as $date) {
                    $array_date[] = $date->format('Y-m-d');
                }
                foreach ($libur as $key) {
                    $array_holiday[] = $key['date_holiday'];
                }
                
                for ($i=0; $i < count($array_date) ; $i++) {
                    if (!in_array($array_date[$i],$array_holiday)) {
                        $data = array(
                            'id_transaksi' => $transaksi->id_transaksi,
                            'id_transaksi_detail' => $detail_transaksi['id_transaksi_detail'],
                            'tgl_pengiriman' => $array_date[$i],
                            'id_customer' => $transaksi->id_transaksi,
                            'detail_paket' => $detail_transaksi['detail_paket'].", ".$detail_transaksi['kategori_paket'],
                            'jml_pack_dikirim' => 1,
                        );

                        $this->db->insert('tbl_transaksi_pengiriman', $data);

                    }
                }
            }
            // var_dump($array_date);exit;
        }
        redirect('transaksi/detailtransaksi/'.$id_trans);
    }

    public function editTransaksi($id_trans)
    {
        $data['transaksi'] = $this->transaksimodel->gettransaksi($id_trans);
        $data['detail_transaksi'] = $this->transaksimodel->getdetailtransaksi($id_trans);

        $qty_total = 0;
        foreach ($data['detail_transaksi'] as $key ) {
            $qty_total += $key['qty_pemesanan'];
        }
        $data['qty_total'] = $qty_total;
        
        // var_dump($data);die;
        $this->load->view('transaksi/edit_trans', $data);
    }

    public function editDetailTransaksi($id_transaksi, $id_detail_transaksi)
    {
        // var_dump($id_transaksi);die;
        $data['detail_transaksi'] = $this->transaksimodel->getdetailtransaksibyid($id_transaksi, $id_detail_transaksi);
        $data['jenis_paket'] = $this->transaksimodel->getJenisPaket();
        $data['kota'] = $this->transaksimodel->getCities();
        $data['kota2'] = $this->transaksimodel->getCities();
        $data['kota3'] = $this->transaksimodel->getCities();
        $data['id_detail_trans'] = $id_detail_transaksi;

        $this->load->view('transaksi/edit_detail_trans', $data);
    }

    public function updateTrans()
    {
        $post = $this->input->post();
        $this->transaksimodel->updatedatatrans($post['id_transaksi']);
        // var_dump($post);die;
        redirect('transaksi');
    }
    
    public function updateDetailTrans($id_detail)
    {
        $post = $this->input->post();

        $this->transaksimodel->updatedatatransdetail($post['id_transaksi']);
        
        redirect('transaksi');
        // var_dump($post);die;
    }
}
