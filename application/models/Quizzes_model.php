<?php

class Quizzes_model extends CI_Model {

    private $table = 'quiz';
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

    public function get_quiz_questions($_quiz_id) {
        $this->db->select('ques.*');
        $this->db->from('question ques');
        $this->db->join('option opti', 'opti.question_id = ques.question_id','left');
        $this->db->join('result resu', 'opti.result_id = resu.result_id','left');       
        $this->db->join('quiz', 'quiz.quiz_id = resu.quiz_id','left');
        $this->db->where(array('quiz.quiz_id'=> $_quiz_id));
        $this->db->group_by('ques.question_id');
        $this->db->order_by('quiz.quiz_id', 'ASC');
        $result = $this->db->get()->result();              
        return $result;
    }

}
