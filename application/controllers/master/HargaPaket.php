<?php

final class HargaPaket extends CI_Controller
{
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('master/harga_paket/front');
    }
}