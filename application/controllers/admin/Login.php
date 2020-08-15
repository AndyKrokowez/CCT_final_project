<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    private $model = NULL;

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index() {
        $data_header['title'] = 'Pannel to administrator';

        if (isset($_POST['user']) && isset($_POST['password'])) {
            $this->model = new Auth_model();
            $this->model->email_user        = $this->input->post('user');
            $this->model->password_user     = $this->input->post('password');
            $this->model->level_user        = 1;
            
            $result = $this->model->auth();
            
            if ($result != false) {
                $this->session->set_userdata($result);
                redirect('admin/start');
            } else {
                $data['erro_login'] = "Error logging in!";
                $this->load->view('template/admin/header_login', $data_header);
                $this->load->view('content/admin/login');
                $this->load->view('template/admin/footer');
            }
        } else {
            $this->load->view('template/admin/header_login', $data_header);
            $this->load->view('content/admin/login');
            $this->load->view('template/admin/footer');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        unset($_SESSION);
        session_regenerate_id(true);

        redirect('/admin');
    }

}
