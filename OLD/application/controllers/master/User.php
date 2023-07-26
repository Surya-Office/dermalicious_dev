<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->model('master/usermodel');
    }

    public function inputuser()
    {
        $data['role'] = $this->usermodel->getrole();
        $this->load->view('master/user/add', $data);
    }

    public function insertUser()
    {
        $post = $this->input->post();

        $password = "HealthyFood";
        $key = "Dermalicious-Healthy-Food";

        $encrypted_password = $this->encrypt->encode($password, $key);
        

        $data = array(
            'nama_user' => $post['nama_user'],
            'email_user' => $post['email_user'],
            'password' => $encrypted_password,

        );

        $this->db->insert('ms_user', $data);
        // var_dump($encrypted_password);die;
        redirect('login/logout');
    }
}

?>