<?php

class Booking_model extends CI_Model {

    private $database   = "booking";
    public $id_booking              = "";
    public $id_vehicle              = "";
    public $id_mechanic             = "";
    public $id_service              = "";
    public $date_service            = "";
    public $status                  = "";

    public function list_all() {

        $this->db->select('booking.id_booking, booking.date_service, booking.status, users.name_user, mobile_user, vehicle.make_vehicle, vehicle.model_vehicle, mechanics.name_mechanic, services.name_service')
                 ->join('vehicle', 'vehicle.id_vehicle = booking.id_vehicle') 
                 ->join('user_vehicles', 'user_vehicles.id_vehicle = vehicle.id_vehicle')
                 ->join('users', 'users.id_user = user_vehicles.id_user')
                 ->join('mechanics', 'mechanics.id_mechanic = booking.id_mechanic')
                 ->join('services', 'services.id_service = booking.id_service')
                 ->order_by('booking.date_service', 'desc');

        $result = $this->db->get($this->database)->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function search_to_date($initial_date, $final_date) {

        $this->db->select('booking.id_booking, booking.date_service, booking.status, users.name_user, mobile_user, vehicle.make_vehicle, vehicle.model_vehicle, mechanics.name_mechanic, services.name_service')
                 ->join('vehicle', 'vehicle.id_vehicle = booking.id_vehicle') 
                 ->join('user_vehicles', 'user_vehicles.id_vehicle = vehicle.id_vehicle')
                 ->join('users', 'users.id_user = user_vehicles.id_user')
                 ->join('mechanics', 'mechanics.id_mechanic = booking.id_mechanic')
                 ->join('services', 'services.id_service = booking.id_service')
                 ->where("booking.date_service BETWEEN '".$initial_date."' AND '".$final_date."'")
                 ->order_by('booking.date_service', 'desc');

        $result = $this->db->get($this->database)->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function list_to_day() {

        $this->db->select('booking.status')
                 ->where('booking.date_service', date('Y/m/d'));

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
    
    public function get_invoice($id) {

        $this->db->select('users.name_user, users.mobile_user, services.name_service, services.price_service, sum(items_parts.price_items_parts) as items, vehicle.model_vehicle, vehicle.license_plate_vehicle')
                 ->join('services', 'services.id_service = booking.id_service')
                 ->join('vehicle', 'vehicle.id_vehicle = booking.id_vehicle')
                 ->join('user_vehicles', 'user_vehicles.id_vehicle = vehicle.id_vehicle')
                 ->join('users', 'users.id_user = user_vehicles.id_user')
                 ->join('booking_items', 'booking_items.id_booking = booking.id_booking')
                 ->join('items_parts', 'items_parts.id_items_parts = booking_items.id_items_parts')
                ->where('booking.id_booking', $id);

        $result = $this->db->get('booking')->result();

        if (count($result) == 1) {
            return $result[0];
        } else {
            return null;
        }
    }
    public function get_invoice_items($id) {

        $this->db->select('booking.id_booking, items_parts.name_items_parts, items_parts.price_items_parts')
                 ->join('booking_items', 'booking_items.id_booking = booking.id_booking')
                 ->join('items_parts', 'items_parts.id_items_parts = booking_items.id_items_parts')
                 ->where('booking.id_booking', $id);

        $result = $this->db->get('booking')->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
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
    
    public function get_status($id) {

        $this->db->select('status')
                 ->where('id_booking', $id);

        $result = $this->db->get('booking')->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function list_items($id) {

        $this->db->select('booking_items.id_booking_items, items_parts.name_items_parts')
                 ->join('items_parts', 'items_parts.id_items_parts = booking_items.id_items_parts')
                 ->where('booking_items.id_booking', $id);

        $result = $this->db->get('booking_items')->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function select($id) {
        $this->db->select('booking.id_booking, booking.date_service, booking.status, users.name_user, vehicle.make_vehicle, vehicle.model_vehicle, vehicle.comments_vehicle, mechanics.name_mechanic, services.name_service')
                 ->join('vehicle', 'vehicle.id_vehicle = booking.id_vehicle') 
                 ->join('user_vehicles', 'user_vehicles.id_vehicle = vehicle.id_vehicle')
                 ->join('users', 'users.id_user = user_vehicles.id_user')
                 ->join('mechanics', 'mechanics.id_mechanic = booking.id_mechanic')
                 ->join('services', 'services.id_service = booking.id_service')
                 ->where('booking.id_booking', $id)
                 ->order_by('booking.date_service', 'desc');

        $result = $this->db->get($this->database)->result();

        if (count($result) == 1) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function list_parts() {
        $this->db->select('items_parts.id_items_parts, items_parts.name_items_parts, items_parts.price_items_parts')
                 ->order_by('items_parts.name_items_parts', 'asc');

        $result = $this->db->get('items_parts')->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function status($id, $status){
        
            $booking = array(
                'status'   =>   $status
            );
        
        $this->db->where('id_booking', $id);
        
        if ( $this->db->update($this->database, $booking) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function delete($id){
        
        $this->db->where('id_booking', $id);
        
        if ( $this->db->delete($this->database) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function del_item($id){
        
        $this->db->select('id_booking')
                 ->where('id_booking_items', $id);

        $id_booking = $this->db->get('booking_items')->result();
        
        if( count($id_booking) > 0 ){
            $this->db->where('id_booking_items', $id);
        
            if ( $this->db->delete('booking_items') ){
                return $id_booking[0]->id_booking;
            } else {
                return FALSE;
            }
        } else {
            return false;
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
    
    public function add_item($booking, $parts){
        
        $parts = array(
                'id_booking'       =>   $booking,
                'id_items_parts'   =>   $parts
        );

        if ( $this->db->insert('booking_items', $parts) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
}
