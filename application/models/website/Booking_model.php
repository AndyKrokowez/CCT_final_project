<?php

class Booking_model extends CI_Model{

    public function list_services(){
        $this->db->select('id_service, name_service, price_service');

        $result = $this->db->get('services')->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
        
    }
    
    public function get_booking_client($id){
        $this->db->select('vehicle.make_vehicle, vehicle.model_vehicle, booking.date_service')
                 ->join('vehicle', 'vehicle.id_vehicle = user_vehicles.id_vehicle')
                 ->join('booking', 'booking.id_vehicle = vehicle.id_vehicle')
                 ->where('user_vehicles.id_user', $id);

        $result = $this->db->get('user_vehicles')->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
        
    }
    
    public function get_vehicles_client($id){
        $this->db->select('vehicle.id_vehicle, vehicle.make_vehicle, vehicle.model_vehicle')
                 ->join('vehicle', 'vehicle.id_vehicle = user_vehicles.id_vehicle')
                 ->where('user_vehicles.id_user', $id);

        $result = $this->db->get('user_vehicles')->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
        
    }
    
    public function new_booking($id){
        $d               = $this->db->select('date_service')->where('id_vehicle', $id)->get('vehicle')->result();
        $date            = $d[0]->date_service;
        
        var_dump($date);
        exit();
        
        $this->load->model('admin/Vehicles_model');
        $this->vehicle = new Vehicles_model();
        
        if ( $this->vehicle->booking($id, $date) ){
            return TRUE;
        } else { 
            return FALSE;
        }
        
    }
    
}
