<?php

class Auth_model extends CI_Model {
    
    private $database   = "users";
    public $id_user         = "";
    public $name_user       = "";
    public $mobile_user     = "";
    public $email_user      = "";
    public $password_user   = "";
    public $level_user      = "";
    public $created_at_user = "";
    public $updated_at_user = "";

    public function auth() {

        $this->db->select('id_user');
        $this->db->select('name_user');
        $this->db->select('level_user');

        $this->db->where('email_user', $this->email_user);
        $this->db->where('password_user', sha1($this->password_user));
        $this->db->where('level_user', $this->level_user);

        $result = $this->db->get($this->database)->result();
        
        if (count($result) === 1) {
            $data = array(
                'id'        => $result[0]->id_user,
                'name'      => $result[0]->name_user,
                'level'     => $result[0]->level_user,
                'logged'    => true
            );
            return $data;
        } else {
            return false;
        }
    }
    
}
