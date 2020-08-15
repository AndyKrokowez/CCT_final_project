<?php

class Vehicle_model extends CI_Model{

    private $database   = "vehicle";
    public $id_vehicle              = "";
    public $type_vehicle            = "";
    public $make_vehicle            = "";
    public $model_vehicle           = "";
    public $license_plate_vehicle   = "";
    public $engine_type_vehicle     = "";
    public $date_service_vehicle    = "";
    public $type_service_vehicle    = "";
    public $comments_vehicle        = "";
    public $created_at_vehicle      = "";
    public $updated_at_vehicle      = "";

    public function create_vehicle(){
        
        $vehicle = array(
                'type_vehicle'          =>   $this->type_vehicle,
                'make_vehicle'          =>   $this->make_vehicle,
                'model_vehicle'         =>   $this->model_vehicle,
                'license_plate_vehicle' =>   $this->license_plate_vehicle,
                'engine_type_vehicle'   =>   $this->engine_type_vehicle,
                'date_service_vehicle'  =>   $this->date_service_vehicle,
                'type_service_vehicle'  =>   $this->type_service_vehicle,
                'comments_vehicle'      =>   $this->comments_vehicle,
                'created_at_vehicle'    =>   date('Y/m/d H:i:s'),
                'updated_at_vehicle'    =>   date('Y/m/d H:i:s')
        );

        if ( $this->db->insert('vehicle', $vehicle) ){
            $this->db->select('id_vehicle')
                     ->where('license_plate_vehicle', $this->license_plate_vehicle)
                     ->order_by('id_vehicle', 'desc')
                     ->limit(1);
            $result = $this->db->get($this->database)->result();
            
            $user_vehicle = array(
                'id_user'                     =>   $this->session->userdata('id'),
                'id_vehicle'                  =>   $result[0]->id_vehicle,
                'created_at_user_vehicles'    =>   date('Y/m/d H:i:s'),
                'updated_at_user_vehicles'    =>   date('Y/m/d H:i:s')
            );
            $this->db->insert('user_vehicles', $user_vehicle);
            
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
}
