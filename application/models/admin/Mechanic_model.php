<?php

class Mechanic_model extends CI_Model {

    private $database   = "mechanics";
    public $id_mechanic         = "";
    public $name_mechanic       = "";

    public function list_all() {

        $this->db->select('id_mechanic, name_mechanic');

        $result = $this->db->get($this->database)->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function list_all_rand() {

        $this->db->select('id_mechanic, name_mechanic')
                 ->order_by('rand()');

        $result = $this->db->get($this->database)->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function select($id) {
        $this->db->select('id_mechanic');
        $this->db->select('name_mechanic');
        
        $this->db->where('id_mechanic', $id);
        
        $result = $this->db->get($this->database)->result();

        if (count($result) == 1) {
            return $result;
        } else {
            return null;
        }
    }

    public function edit($id){
        
            $mechanic = array(
                'name_mechanic'     =>   $this->name_mechanic
            );
        
        $this->db->where('id_mechanic', $id);
        
        if ( $this->db->update($this->database, $mechanic) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function delete($id){
        
        $this->db->where('id_mechanic', $id);
        
        if ( $this->db->delete($this->database) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function create(){
        
        $mechanic = array(
                'name_mechanic'   =>   $this->name_mechanic
            );

        if ( $this->db->insert($this->database, $mechanic) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
}
