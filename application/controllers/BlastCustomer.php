<?php

class BlastCustomer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->level != 'super admin') {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $this->load->view('blast/blast_customer');
    }

    // public function MainPackage()
    // {
    //     $this->load->view('dashboard/main_package');
    // }
}
