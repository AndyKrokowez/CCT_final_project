<?php

class Vehicles_model extends CI_Model {

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

    public function list_all() {

        $this->db->select('vehicle.id_vehicle, vehicle.make_vehicle, vehicle.model_vehicle, users.name_user')
                 ->join('user_vehicles', 'user_vehicles.id_vehicle = vehicle.id_vehicle')
                 ->join('users', 'users.id_user = user_vehicles.id_user')
                 ->where('users.level_user', 2);

        $result = $this->db->get($this->database)->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function select_date_service_vehicle($id) {

        $this->db->select('date_service_vehicle')
                 ->where('id_vehicle', $id);

        $result = $this->db->get($this->database)->result();

        if (count($result) == 1) {
            return $result[0]->date_service_vehicle;
        } else {
            return null;
        }
    }
    
    public function booking($id, $date) {

        $this->load->model('admin/Mechanic_model');
        $this->mechanic = new Mechanic_model();
        $mechanic = $this->mechanic->list_all_rand();
        $vehicle  = $this->select($id);
        
        foreach ($mechanic as $m) {
            $this->db->select('count(booking.id_booking) as qtd')
                 ->where('booking.date_service', $date)
                 ->where('booking.id_mechanic', $m->id_mechanic)
                 ->order_by('booking.id_mechanic', 'asc');
            $result = $this->db->get('booking')->result();
            if($result[0]->qtd < 4){
                $booking = array(
                    'id_vehicle'    =>   $id,
                    'id_mechanic'   =>   $m->id_mechanic,
                    'id_service'    =>   $vehicle[0]->type_service_vehicle,
                    'date_service'  =>   $date,
                    'status'        =>   'Booked'
                );
                if ( $this->db->insert('booking', $booking) ){
                    return TRUE;
                } else { 
                    
                }
            }
        }
        return FALSE;
        /**
        $this->db->select('count(booking.id_booking) as qtd, booking.id_mechanic')
                 ->where('booking.date_service', $date)
                 ->order_by('booking.id_mechanic', 'asc');
        $result = $this->db->get('booking')->result();
        
        $this->load->model('admin/Mechanic_model');
        $this->mechanic = new Mechanic_model();
        $mechanic = $this->mechanic->list_all();
        $vehicle  = $this->select($id);
        
        if(count($result) > 1){
            $this->db->select('booking.date_service, mechanics.id_mechanic')
                     ->join('mechanics', 'mechanics.id_mechanic = booking.id_mechanic')
                     ->where('booking.date_service', $date)
                     ->where('count(booking.id_vehicle) < 4');
            $result = $this->db->get('booking')->result();
            
            $booking = array(
                'id_vehicle'    =>   $id,
                'id_mechanic'   =>   $result[0]->id_mechanic,
                'id_service'    =>   $vehicle[0]->type_service_vehicle,
                'date_service'  =>   $date,
                'status'        =>   'Booked'
            );
            if ( $this->db->insert('booking', $booking) ){
                return TRUE;
            } else { 
                return FALSE;
            }
        } else {
            $booking = array(
                'id_vehicle'    =>   $id,
                'id_mechanic'   =>   $mechanic[0]->id_mechanic,
                'id_service'    =>   $vehicle[0]->type_service_vehicle,
                'date_service'  =>   $date,
                'status'        =>   'Booked'
            );
            if ( $this->db->insert('booking', $booking) ){
                return TRUE;
            } else { 
                return FALSE;
            }
        }
         */
        
    }
    
    public function list_clients() {

        $this->db->select('id_user, name_user')
                 ->where('level_user', 2);

        $result = $this->db->get('users')->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function select($id) {
        $this->db->select('vehicle.id_vehicle')
                 ->select('vehicle.type_vehicle')
                 ->select('vehicle.make_vehicle')
                 ->select('vehicle.model_vehicle')
                 ->select('vehicle.license_plate_vehicle')
                 ->select('vehicle.engine_type_vehicle')
                 ->select('vehicle.date_service_vehicle')
                 ->select('vehicle.type_service_vehicle')
                 ->select('vehicle.comments_vehicle')
                 ->select('vehicle.created_at_vehicle')
                 ->select('vehicle.updated_at_vehicle')
                 ->select('user_vehicles.id_user')
                
                 ->join('user_vehicles', 'user_vehicles.id_vehicle = vehicle.id_vehicle');
        
        $this->db->where('vehicle.id_vehicle', $id);
        
        $result = $this->db->get($this->database)->result();

        if (count($result) == 1) {
            return $result;
        } else {
            return null;
        }
    }

    public function edit($id){
        
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
        
        $this->db->where('id_vehicle', $id);
        
        if ( $this->db->update($this->database, $vehicle) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function delete($id){
        
        $this->db->where('id_vehicle', $id);
        
        if ( $this->db->delete($this->database) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function create($client){
        
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

        if ( $this->db->insert($this->database, $vehicle) ){
            $this->db->select('id_vehicle')
                     ->where('license_plate_vehicle', $this->license_plate_vehicle)
                     ->order_by('id_vehicle', 'desc')
                     ->limit(1);
            $result = $this->db->get($this->database)->result();
            
            $user_vehicle = array(
                'id_user'                     =>   $client,
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
