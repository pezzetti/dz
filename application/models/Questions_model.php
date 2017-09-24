<?php

class Questions_model extends CI_Model {
    private $table = 'question';
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
