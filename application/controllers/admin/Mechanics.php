<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mechanics extends CI_Controller {

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
            $this->load->model('admin/Mechanic_model');
            $this->model = new Mechanic_model();
        }
    }
    
    public function index() {

        $data_nav['name'] = $this->session->userdata('name');
        $data['mechanics']    = $this->model->list_all();

        $this->load->view('template/admin/header');
        $this->load->view('template/admin/nav', $data_nav);
        $this->load->view('content/admin/mechanic', $data);
        $this->load->view('template/admin/footer');
    }

    public function edit($id) {

        if (isset($_POST['name'])) {

            $this->model->name_mechanic      = $this->input->post('name');
            
            $result = $this->model->edit($id);

            if ($result != false) {
                $data_nav['name']   = $this->session->userdata('name');
                $data['mechanics']  = $this->model->select($id);
                
                $data['result']   =  array('result' => "sucess_edit");
                $this->session->set_userdata($data['result']);

                redirect("admin/mechanics");
            } else {
                $data_nav['name']   = $this->session->userdata('name');
                $data['mechanics']  = $this->model->select($id);
                
                $data['result']   =  array('result' => "error_edit");

                $this->load->view('template/admin/header');
                $this->load->view('template/admin/nav', $data_nav);
                $this->load->view('content/admin/mechanics/update', $data);
                $this->load->view('template/admin/footer');
            }
        } else if ($id > 0) {

            $data_nav['name']   = $this->session->userdata('name');
            $data['mechanics']  = $this->model->select($id);

            $this->load->view('template/admin/header');
            $this->load->view('template/admin/nav', $data_nav);
            $this->load->view('content/admin/mechanics/update', $data);
            $this->load->view('template/admin/footer');
        }
    }

    public function delete($id) {

        $result = $this->model->delete($id);
        
        if ($result != false){
            $data['result']   =  array('result' => "sucess_delete");
            $this->session->set_userdata($data['result']);
        } else {
            $data['result']   =  array('result' => "error_delete");
            $this->session->set_userdata($data['result']);
        }
        redirect('admin/mechanics');
        
    }
    
    public function create() {
        
        if (isset($_POST['name'])) {

            $this->model->name_mechanic      = $this->input->post('name');
            
            $result = $this->model->create();

            if ($result != false) {
                $data['result']   =  array('result' => "sucess_create");
                $this->session->set_userdata($data['result']);

                redirect("admin/mechanics");
            } else {
                $data['result']   =  array('result' => "error_create");
                $this->session->set_userdata($data['result']);

                redirect("admin/mechanics");
            }
        } 
        $data_nav['name']   = $this->session->userdata('name');

        $this->load->view('template/admin/header');
        $this->load->view('template/admin/nav', $data_nav);
        $this->load->view('content/admin/mechanics/create');
        $this->load->view('template/admin/footer');
    }
    
}
