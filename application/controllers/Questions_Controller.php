<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include('Base_Controller.php');

class Questions_Controller extends Base_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('questions_model');
    }

    /*
     * Routes
     */

    public function index() {
        $this->load_view('admin/questions/index');
    }

    public function create() {
        $this->load_view('admin/questions/create_question');
    }

    public function update() {
        $this->load_view('admin/questions/update_question');
    }

    /*
     * Methods
     */

    public function save(){
        $data['question_description'] = $this->input->post('question_description');
        $this->questions_model->save($data);
        redirect('questions');        
    }

    public function fetch_questions() {
        $questions = $this->questions_model->read();
        echo json_encode($questions);
    }

    public function search_questions() {
        $search_field = $this->input->post('question_nome');
        $questions = $this->questions_model->search($search_field);
        echo json_encode($questions['questions']);
    }
   


}
