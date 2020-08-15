<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/home');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function contact() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/contact');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function register() {
        $data = "";
        if (isset($_POST['name']) && isset($_POST['mobile']) && isset($_POST['email']) && isset($_POST['password'])) {

            $this->load->model('website/User_model');
            $this->model = new User_model();
            
            $this->model->name_user     = $this->input->post('name');
            $this->model->mobile_user   = $this->input->post('mobile');
            $this->model->email_user    = $this->input->post('email');
            $this->model->password_user = $this->input->post('password');
            $this->model->level_user    = 2;
            $this->model->created_at_user = date('Y/m/d H:i:s');
            $this->model->updated_at_user = date('Y/m/d H:i:s');

            $result = $this->model->create_user();

            if ($result != false) {
                $data['result'] = array('result' => "sucess_create");
                $this->session->set_userdata($data['result']);
                    redirect("login");
            } else {
                $data['result'] = array('result' => "error_create");
                $this->session->set_userdata($data['result']);
                header("location:javascript://history.go(-1)");
            }
        }

        $this->load->view('template/website/header');
        $this->load->view('content/website/register', $data);
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function create_car() {
        if (!$this->session->userdata('logged')) {
            redirect('login');
        }
        
        if (isset($_POST['type']) && isset($_POST['make']) && isset($_POST['model']) && isset($_POST['license_plate']) && isset($_POST['engine_type']) && isset($_POST['date_service']) && isset($_POST['type_service']) && isset($_POST['comments'])) {

            $this->load->model('website/Vehicle_model');
            $this->v = new Vehicle_model();
            
            $this->v->type_vehicle          = $this->input->post('type');
            $this->v->make_vehicle          = $this->input->post('make');
            $this->v->model_vehicle         = $this->input->post('model');
            $this->v->license_plate_vehicle = $this->input->post('license_plate');
            $this->v->engine_type_vehicle   = $this->input->post('engine_type');
            $this->v->date_service_vehicle  = $this->input->post('date_service');
            $this->v->type_service_vehicle  = $this->input->post('type_service');
            $this->v->comments_vehicle      = $this->input->post('comments');

            $result = $this->v->create_vehicle();
            
            if ($result != false) {
                $data['result'] = array('result' => "sucess_create");
                $this->session->set_userdata($data['result']);
                    redirect("booking");
            } else {
                $data['result'] = array('result' => "error_create");
                $this->session->set_userdata($data['result']);
                header("location:javascript://history.go(-1)");
            }
        }
        
        $this->load->model('website/Booking_model');
        $this->model = new Booking_model();
        
        $data['services'] = $this->model->list_services();
        
        $this->load->view('template/website/header');
        $this->load->view('content/website/register_car', $data);
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
        
    }
    
    public function start() {
        if (!$this->session->userdata('logged')) {
            redirect('login');
        }
        
        $this->load->view('template/website/header');
        $this->load->view('content/website/start');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
        
    }
    
    public function booking() {
        if (!$this->session->userdata('logged')) {
            redirect('login');
        }
        
        $this->load->model('website/Booking_model');
        $this->model = new Booking_model();
        
        $data['vehicles'] = $this->model->get_vehicles_client($this->session->userdata('id'));
        
        $this->load->view('template/website/header');
        $this->load->view('content/website/booking', $data);
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
        
    }
    public function insert_booking($id) {
        if (!$this->session->userdata('logged')) {
            redirect('login');
        }
        
        /**
        $this->load->model('website/Booking_model');
        $this->b = new Booking_model();
        
        if( $this->b->new_booking($id) ){
            redirect('booking');
        } else {
            redirect('booking');
        }
        */
        $this->load->model('admin/Vehicles_model');
        $this->v = new Vehicles_model();
        
        $date   = $this->v->select_date_service_vehicle($id);
        $result = $this->v->booking($id, $date);
        
        if( $result ){
            redirect('view_booking');
        } else {
            redirect('booking');
        }
        
    }
    
    public function view_booking() {
        if (!$this->session->userdata('logged')) {
            redirect('login');
        }
        
        $this->load->model('website/Booking_model');
        $this->model = new Booking_model();
        
        $data['booking'] = $this->model->get_booking_client($this->session->userdata('id'));
        
        $this->load->view('template/website/header');
        $this->load->view('content/website/view_booking', $data);
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
        
    }
    
    public function view_vehicles() {
        if (!$this->session->userdata('logged')) {
            redirect('login');
        }
        
        $this->load->model('website/Booking_model');
        $this->model = new Booking_model();
        
        $data['vehicles'] = $this->model->get_vehicles_client($this->session->userdata('id'));
        
        $this->load->view('template/website/header');
        $this->load->view('content/website/view_vehicles', $data);
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
        
    }

    public function login() {
        if ($this->session->userdata('logged') == true) {
            redirect('booking');
        }
        $data['msg'] = "";
        
        if (isset($_POST['email']) && isset($_POST['password'])) {
            
            $this->load->model('website/User_model');
            $this->model = new User_model();
            
            $this->model->email_user    = $this->input->post('email');
            $this->model->password_user = $this->input->post('password');
            $result = $this->model->auth();

            if ($result != false) {
                $this->session->set_userdata($result);
                redirect('start');
            } else {
                $data['msg'] = "Error!";
            }
        }
        
        $this->load->view('template/website/header');
        $this->load->view('content/website/login', $data);
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }
    
    public function logout(){
        session_start();
        session_destroy();
        unset($_SESSION);
        session_regenerate_id(true);

        redirect('login');
    }

    public function staff() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/staff');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function history() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/history');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function valet() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/valet');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function car_parts() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/car_parts');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function annual_services() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/annual_services');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function major_repair() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/major_repair');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function major_service() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/major_service');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function fault_repair() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/fault_repair');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function nct_check() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/nct_check');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function get_advice() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/get_advice');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function privacy_policy() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/privacy_policy');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

    public function terms_service() {
        $this->load->view('template/website/header');
        $this->load->view('content/website/terms_service');
        $this->load->view('template/website/navbar');
        $this->load->view('template/website/footer');
    }

}
