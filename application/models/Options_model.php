<?php

class Options_model extends CI_Model {

    private $table = 'option';
    
    function __construct() {
        parent::__construct();
    }

    public function read() {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('result', 'result.result_id = option.result_id','left');
        $this->db->join('question', 'question.question_id = option.question_id','left');
       $result = $this->db->get()->result();       
       return $result;
    }    

    public function save($data){
         $this->db->insert($this->table,$data);
    }

    public function get_options_for_question($_question_id){        
        return $this->db->get_where($this->table,array('question_id'=>$_question_id))->result();
    }

    public function get_result($_option_id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('result', 'result.result_id = option.result_id','left');
        $this->db->where(array("option_id"=>$_option_id));
        return $this->db->get()->row();
    }


}
