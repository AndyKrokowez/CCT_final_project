<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicles extends CI_Controller {

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
            $this->load->model('admin/Vehicles_model');
            $this->model = new Vehicles_model();
        }
    }
    
    public function index() {

        $data_nav['name'] = $this->session->userdata('name');
        $data['vehicles'] = $this->model->list_all();

        $this->load->view('template/admin/header');
        $this->load->view('template/admin/nav', $data_nav);
        $this->load->view('content/admin/vehicles', $data);
        $this->load->view('template/admin/footer');
    }
    
    public function booking($id) {

        $date   = $this->model->select_date_service_vehicle($id);
        $result = $this->model->booking($id, $date);
        
        if ($result != false) {
                $data['result']   =  array('result' => "sucess_booking");
                $this->session->set_userdata($data['result']);

                redirect("admin/booking");
        } else {
                $data['result']   =  array('result' => "error_booking");
                $this->session->set_userdata($data['result']);

                redirect("admin/vehicles");
        }
        
    }

    public function edit($id) {

        if (isset($_POST['client']) && isset($_POST['type_vehicle']) && isset($_POST['make_vehicle']) && isset($_POST['model_vehicle']) && isset($_POST['license_plate']) && isset($_POST['engine_type']) && isset($_POST['date_service']) && isset($_POST['type_service'])) {

            $this->model->type_vehicle              = $this->input->post('type_vehicle');
            $this->model->make_vehicle              = $this->input->post('make_vehicle');
            $this->model->model_vehicle             = $this->input->post('model_vehicle');
            $this->model->license_plate_vehicle     = $this->input->post('license_plate');
            $this->model->engine_type_vehicle       = $this->input->post('engine_type');
            $this->model->date_service_vehicle      = $this->input->post('date_service');
            $this->model->type_service_vehicle      = $this->input->post('type_service');
            $this->model->comments_vehicle          = $this->input->post('comments');
            
            $result = $this->model->edit($id);

            if ($result != false) {
                $data_nav['name']   = $this->session->userdata('name');
                $data['mechanics']  = $this->model->select($id);
                
                $data['result']   =  array('result' => "sucess_edit");
                $this->session->set_userdata($data['result']);

                redirect("admin/vehicles");
            } else {
                $this->load->model('admin/Services_model');
                $this->services = new Services_model();
        
                $data_nav['name']   = $this->session->userdata('name');
                $data['services']   = $this->services->list_all();
                $data['clients']    = $this->model->list_clients();
                $data['vehicles']  = $this->model->select($id);
                
                $data['result']   =  array('result' => "error_edit");

                $this->load->view('template/admin/header');
                $this->load->view('template/admin/nav', $data_nav);
                $this->load->view('content/admin/vehicles/update', $data);
                $this->load->view('template/admin/footer');
            }
        } else if ($id > 0) {

            $this->load->model('admin/Services_model');
            $this->services = new Services_model();
        
            $data_nav['name']   = $this->session->userdata('name');
            $data['services']   = $this->services->list_all();
            $data['clients']    = $this->model->list_clients();
            $data['vehicles']  = $this->model->select($id);

            $this->load->view('template/admin/header');
            $this->load->view('template/admin/nav', $data_nav);
            $this->load->view('content/admin/vehicles/update', $data);
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
        redirect('admin/vehicles');
        
    }
    
    public function create() {
        
        if (isset($_POST['client']) && isset($_POST['type_vehicle']) && isset($_POST['make_vehicle']) && isset($_POST['model_vehicle']) && isset($_POST['license_plate']) && isset($_POST['engine_type']) && isset($_POST['date_service']) && isset($_POST['type_service'])) {

            $this->model->type_vehicle              = $this->input->post('type_vehicle');
            $this->model->make_vehicle              = $this->input->post('make_vehicle');
            $this->model->model_vehicle             = $this->input->post('model_vehicle');
            $this->model->license_plate_vehicle     = $this->input->post('license_plate');
            $this->model->engine_type_vehicle       = $this->input->post('engine_type');
            $this->model->date_service_vehicle      = $this->input->post('date_service');
            $this->model->type_service_vehicle      = $this->input->post('type_service');
            $this->model->comments_vehicle          = $this->input->post('comments');
            
            $result = $this->model->create($this->input->post('client'));

            if ($result != false) {
                $data['result']   =  array('result' => "sucess_create");
                $this->session->set_userdata($data['result']);

                redirect("admin/vehicles");
            } else {
                $data['result']   =  array('result' => "error_create");
                $this->session->set_userdata($data['result']);

                redirect("admin/vehicles");
            }
        } 
        $this->load->model('admin/Services_model');
        $this->services = new Services_model();
        
        $data_nav['name']   = $this->session->userdata('name');
        $data['services']   = $this->services->list_all();
        $data['clients']    = $this->model->list_clients();
        

        $this->load->view('template/admin/header');
        $this->load->view('template/admin/nav', $data_nav);
        $this->load->view('content/admin/vehicles/create', $data);
        $this->load->view('template/admin/footer');
    }
    
}
