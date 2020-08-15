<?php

class Services_model extends CI_Model {

    private $database   = "services";
    public $id_service         = "";
    public $name_service       = "";
    public $price_service      = "";
    public $created_at_service = "";
    public $updated_at_service = "";

    public function list_all() {

        $this->db->select('id_service, name_service, price_service, updated_at_service');

        $result = $this->db->get($this->database)->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function select_service($id) {
        $this->db->select('id_service');
        $this->db->select('name_service');
        $this->db->select('price_service');
        $this->db->select('created_at_service');
        $this->db->select('updated_at_service');
        
        $this->db->where('id_service', $id);
        
        $result = $this->db->get($this->database)->result();

        if (count($result) == 1) {
            return $result;
        } else {
            return null;
        }
    }

    public function edit_service($id){
        
        $service = array(
            'name_service'         =>   $this->name_service,
            'price_service'        =>   $this->price_service,
            'updated_at_service'   =>   date('y/m/d H:i:s')
        );
        
        $this->db->where('id_service', $id);
        
        if ( $this->db->update($this->database, $service) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function delete_service($id){
        
        $this->db->where('id_service', $id);
        
        if ( $this->db->delete($this->database) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function create_service(){
        
        $service = array(
                'name_service'         =>   $this->name_service,
                'price_service'        =>   $this->price_service,
                'created_at_service'   =>   date('y/m/d H:i:s'),
                'updated_at_service'   =>   date('y/m/d H:i:s')
            );

        if ( $this->db->insert($this->database, $service) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
}
