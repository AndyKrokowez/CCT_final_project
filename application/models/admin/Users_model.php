<?php

class Users_model extends CI_Model {

    private $database   = "users";
    public $id_user         = "";
    public $name_user       = "";
    public $mobile_user     = "";
    public $email_user      = "";
    public $password_user   = "";
    public $level_user      = "";
    public $created_at_user = "";
    public $updated_at_user = "";

    public function list_all() {

        $this->db->select('id_user, name_user, mobile_user, email_user, level_user');

        $result = $this->db->get($this->database)->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function select_user($id) {
        $this->db->select('id_user');
        $this->db->select('name_user');
        $this->db->select('mobile_user');
        $this->db->select('email_user');
        $this->db->select('level_user');
        $this->db->select('created_at_user');
        $this->db->select('updated_at_user');
        
        $this->db->where('id_user', $id);
        
        $result = $this->db->get($this->database)->result();

        if (count($result) == 1) {
            return $result;
        } else {
            return null;
        }
    }

    public function edit_user($id){
        
        if($this->password_user != ""){
            $user = array(
                'name_user'         =>   $this->name_user,
                'mobile_user'       =>   $this->mobile_user,
                'email_user'        =>   $this->email_user,
                'password'          =>   sha1($this->password),
                'level_user'        =>   $this->level_user,
                'updated_at_user'   =>   date('y/m/d H:i:s')
            );
        } else {
            $user = array(
                'name_user'         =>   $this->name_user,
                'mobile_user'       =>   $this->mobile_user,
                'email_user'        =>   $this->email_user,
                'level_user'        =>   $this->level_user,
                'updated_at_user'   =>   date('y/m/d H:i:s')
            );
        }
        
        $this->db->where('id_user', $id);
        
        if ( $this->db->update($this->database, $user) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function delete_user($id){
        
        $this->db->where('id_user', $id);
        
        if ( $this->db->delete($this->database) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function create_user(){
        
        $user = array(
                'name_user'         =>   $this->name_user,
                'mobile_user'       =>   $this->mobile_user,
                'email_user'        =>   $this->email_user,
                'password_user'     =>   sha1($this->password_user),
                'level_user'        =>   $this->level_user,
                'created_at_user'   =>   date('y/m/d H:i:s'),
                'updated_at_user'   =>   date('y/m/d H:i:s')
            );

        if ( $this->db->insert($this->database, $user) ){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
}
