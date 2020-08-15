<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('id') ||
                !$this->session->userdata('name') ||
                !$this->session->userdata('level')) {
            redirect('/admin');
        } else {
            if ($this->session->userdata('logged') != true && $this->session->userdata('level') != 1) {
                redirect('/admin');
            }
            //$this->load->model('Auth_model');
            //$this->model = new Auth_model();
        }
    }

    public function index() {
        $data_header['title'] = 'Pannel to administrator';
        $data_nav['name']     = $this->session->userdata('name');
        
        $this->load->model('admin/Booking_model');
        $this->model = new Booking_model();
        
        if (isset($_POST['initial_date']) && isset($_POST['final_date'])) {
            $data['booking']      = $this->model->search_to_date($this->input->post('initial_date'), $this->input->post('final_date'));
        } else {
            $data['booking']      = null;
        }
        $data['to_day']       = $this->model->list_to_day();
        
        $this->load->view('template/admin/header', $data_header);
        $this->load->view('template/admin/nav', $data_nav);
        $this->load->view('content/admin/index', $data);
        $this->load->view('template/admin/footer');
        
    }

}
