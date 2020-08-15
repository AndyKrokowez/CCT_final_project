<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
            $this->load->model('admin/Users_model');
            $this->model = new Users_model();
        }
    }
    
    public function index() {

        $data_nav['name'] = $this->session->userdata('name');
        $data['users']    = $this->model->list_all();

        $this->load->view('template/admin/header');
        $this->load->view('template/admin/nav', $data_nav);
        $this->load->view('content/admin/user', $data);
        $this->load->view('template/admin/footer');
    }

    public function edit($id) {

        if (isset($_POST['name']) && isset($_POST['mobile']) && isset($_POST['email']) && isset($_POST['level'])) {

            $this->model->name_user          = $this->input->post('name');
            $this->model->mobile_user        = $this->input->post('mobile');
            $this->model->email_user         = $this->input->post('email');
            $this->model->level_user         = $this->input->post('level');
            
            if(strlen($this->input->post('pass1')) > 0 && $this->input->post('pass1') === $this->input->post('pass2')){
                $this->model->password_user     = $this->input->post('pass1');
            }
            
            $result = $this->model->edit_user($id);

            if ($result != false) {
                $data_nav['name']   = $this->session->userdata('name');
                $data['users']      = $this->model->select_user($id);
                
                $data['result']   =  array('result' => "sucess_edit");
                $this->session->set_userdata($data['result']);

                redirect("admin/users");
            } else {
                $data_nav['name']   = $this->session->userdata('name');
                $data['users']      = $this->model->select_user($id);
                
                $data['result']   =  array('result' => "error_edit");

                $this->load->view('template/admin/header');
                $this->load->view('template/admin/nav', $data_nav);
                $this->load->view('content/admin/users/update', $data);
                $this->load->view('template/admin/footer');
            }
        } else if ($id > 0) {

            $data_nav['name']   = $this->session->userdata('name');
            $data['users']      = $this->model->select_user($id);

            $this->load->view('template/admin/header');
            $this->load->view('template/admin/nav', $data_nav);
            $this->load->view('content/admin/users/update', $data);
            $this->load->view('template/admin/footer');
        }
    }

    public function delete($id) {

        $result = $this->model->delete_user($id);
        
        if ($result != false){
            $data['result']   =  array('result' => "sucess_delete");
            $this->session->set_userdata($data['result']);
        } else {
            $data['result']   =  array('result' => "error_delete");
            $this->session->set_userdata($data['result']);
        }
        redirect('admin/users');
        
    }
    
    public function create() {
        
        if (isset($_POST['name']) && isset($_POST['mobile']) && isset($_POST['email']) && isset($_POST['level'])) {

            $this->model->name_user          = $this->input->post('name');
            $this->model->mobile_user        = $this->input->post('mobile');
            $this->model->email_user         = $this->input->post('email');
            $this->model->level_user         = $this->input->post('level');
            
            if(strlen($this->input->post('pass1')) > 0 && $this->input->post('pass1') === $this->input->post('pass2')){
                $this->model->password_user     = $this->input->post('pass1');
            }
            
            $result = $this->model->create_user();

            if ($result != false) {
                $data['result']   =  array('result' => "sucess_create");
                $this->session->set_userdata($data['result']);

                redirect("admin/users");
            } else {
                $data['result']   =  array('result' => "error_create");
                $this->session->set_userdata($data['result']);

                redirect("admin/users");
            }
        } 
        $data_nav['name']   = $this->session->userdata('name');

        $this->load->view('template/admin/header');
        $this->load->view('template/admin/nav', $data_nav);
        $this->load->view('content/admin/users/create');
        $this->load->view('template/admin/footer');
    }
    
}
