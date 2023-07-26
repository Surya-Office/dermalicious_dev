<?php

class Customer extends CI_Controller
{
    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->API = "http://103.11.135.246:1508/derma-esthetic-api/getCustomer?api_key=Cx7RouVO11DDx1OHuLuJkwXRL81abb";
        $this->load->library('Curl');
        // $this->load->model('master/customermodel');
    }

    public function index()
    {
        $get_cust = json_decode($this->curl->simple_get('http://103.11.135.246:1508/derma-esthetic-api/getCustomer?api_key=Cx7RouVO11DDx1OHuLuJkwXRL81abb&page=6'));

        $data_cust = $get_cust->data;
        $page = $get_cust->total_page;
        // var_dump($data_cust);exit;
        // $available_cust = $
        for ($i=0; $i < count($data_cust) ; $i++) { 
            
            $id_customer = $data_cust[$i]->CUSTOMER_ID;
            $nama_customer = $data_cust[$i]->CUSTOMER_NAME;
            $telephone = $data_cust[$i]->TELEPHONE;           
            
            $data[] = array(
                'id_customer' => $id_customer,
                'nama_customer' => $nama_customer,
                'telepon_1' => $telephone,
                'telepon_2' => $telephone,
            );
        }
        // var_dump($data);exit;
        // $hasil = $this->db->insert_batch('ms_customer', $data);
        // echo $hasil;
        
        // $this->load->view('master/customer/front', $data);
    }
}
