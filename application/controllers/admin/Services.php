<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

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
            $this->load->model('admin/Services_model');
            $this->model = new Services_model();
        }
    }
    
    public function index() {

        $data_nav['name'] = $this->session->userdata('name');
        $data['services']    = $this->model->list_all();

        $this->load->view('template/admin/header');
        $this->load->view('template/admin/nav', $data_nav);
        $this->load->view('content/admin/services', $data);
        $this->load->view('template/admin/footer');
    }

    public function edit($id) {

        if (isset($_POST['name']) && isset($_POST['price'])) {

            $this->model->name_service          = $this->input->post('name');
            $this->model->price_service         = $this->input->post('price');
            
            $result = $this->model->edit_service($id);

            if ($result != false) {
                $data['result']   =  array('result' => "sucess_edit");
                $this->session->set_userdata($data['result']);

                redirect("admin/services");
            } else {
                $data['result']   =  array('result' => "error_edit");
                $this->session->set_userdata($data['result']);

                redirect("admin/services");
            }
        } 
        
        $data_nav['name']   = $this->session->userdata('name');
        $data['services']      = $this->model->select_service($id);

        $this->load->view('template/admin/header');
        $this->load->view('template/admin/nav', $data_nav);
        $this->load->view('content/admin/services/update', $data);
        $this->load->view('template/admin/footer');
    }

    public function delete($id) {

        $result = $this->model->delete_service($id);
        
        if ($result != false){
            $data['result']   =  array('result' => "sucess_delete");
            $this->session->set_userdata($data['result']);
        } else {
            $data['result']   =  array('result' => "error_delete");
            $this->session->set_userdata($data['result']);
        }
        redirect('admin/services');
        
    }
    
    public function create() {
        
        if (isset($_POST['name']) && isset($_POST['price'])) {

            $this->model->name_service          = $this->input->post('name');
            $this->model->price_service         = $this->input->post('price');
            
            $result = $this->model->create_service();

            if ($result != false) {
                $data['result']   =  array('result' => "sucess_create");
                $this->session->set_userdata($data['result']);

                redirect("admin/services");
            } else {
                $data['result']   =  array('result' => "error_create");
                $this->session->set_userdata($data['result']);

                redirect("admin/services");
            }
        } 
        $data_nav['name']   = $this->session->userdata('name');

        $this->load->view('template/admin/header');
        $this->load->view('template/admin/nav', $data_nav);
        $this->load->view('content/admin/services/create');
        $this->load->view('template/admin/footer');
    }
    
}
