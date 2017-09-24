<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include('Base_Controller.php');

class Quizzes_Controller extends Base_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('quizzes_model');
    }

    /*
     * Routes
     */

    public function index() {
        $this->load_view('admin/quizzes/index');
    }

    public function create() {
        $this->load_view('admin/quizzes/create_quiz');
    }

    public function update() {
        $this->load_view('admin/quizzes/update_quiz');
    }

    /*
     * Methods
     */

    public function save(){
        $data['quiz_nome'] = $this->input->post('quiz_nome');
        $this->quizzes_model->save($data);
        redirect('quizzes');        
    }

    public function fetch_quizzes() {
        $quizzes = $this->quizzes_model->read();
        echo json_encode($quizzes);
    }

    public function search_quizzes() {
        $search_field = $this->input->post('quiz_nome');
        $quizzes = $this->quizzes_model->search($search_field);
        echo json_encode($quizzes['quizzes']);
    }
    /* save */
    public function create_quiz() {
        $quiz_name = $this->input->post('quiz_name');
        $quiz = $this->quizzes_model->create($quiz_name);
        if (!$quiz) {
            $data['message_error'] = true;
            $this->load->view('quizzes/create', $data);
        } else {
            redirect('quizzes');
        }
    }


}
