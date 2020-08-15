<?php

class Items_model extends CI_Model {

    private $database   = "items_parts";
    public $id_items_parts     = "";
    public $name_items_parts   = "";
    public $price_items_parts  = "";

    public function list_all() {

        $this->db->select('id_items_parts, name_items_parts, price_items_parts');

        $result = $this->db->get($this->database)->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function select($id) {
        $this->db->select('id_items_parts');
        $this->db->select('name_items_parts');
        $this->db->select('price_items_parts');
        
        $this->db->where('id_items_parts', $id);
        
        $result = $this->db->get($this->database)->result();

        if (count($result) == 1) {
            return $result;
        } else {
            return null;
        }
    }

    public function edit($id){
        
            $mechanic = array(
                'name_items_parts'    =>   $this->name_items_parts,
                'price_items_parts'   =>   $this->price_items_parts
            );
        
        $this->db->where('id_items_parts', $id);
        
        if ( $this->db->update($this->database, $mechanic) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function delete($id){
        
        $this->db->where('id_items_parts', $id);
        
        if ( $this->db->delete($this->database) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function create(){
        
        $item = array(
                'name_items_parts'    =>   $this->name_items_parts,
                'price_items_parts'   =>   $this->price_items_parts
        );

        if ( $this->db->insert($this->database, $item) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
}
