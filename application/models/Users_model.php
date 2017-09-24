<?php

class Users_model extends CI_Model {
    private $table = 'user';
    function __construct() {
        parent::__construct();
    }

    public function user_auth($user) {
        return $this->db->get_where($this->table,$user)->result();
    }

    
    
}
