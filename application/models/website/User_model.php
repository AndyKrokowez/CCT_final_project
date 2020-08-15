<?php

class User_model extends CI_Model {

    private $database   = "users";
    public $id_user         = "";
    public $name_user       = "";
    public $mobile_user     = "";
    public $email_user      = "";
    public $password_user   = "";
    public $level_user      = "";
    public $created_at_user = "";
    public $updated_at_user = "";

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
    
    public function auth() {

        $this->db->select('id_user')
                 ->select('name_user')
                 ->select('level_user');

        $this->db->where('email_user', $this->email_user)
             ->where('password_user', sha1($this->password_user))
             ->where('level_user', 2);
        
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
