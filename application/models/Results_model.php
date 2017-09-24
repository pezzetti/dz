<?php

class Results_model extends CI_Model {
    private $table = 'result';
    function __construct() {
        parent::__construct();
    }

    public function read() {
       $result = $this->db->get_where($this->table)->result();
       return $result;
    }    

    public function save($data){
         $this->db->insert($this->table,$data);
    }

}
