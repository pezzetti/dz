<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include('Base_Controller.php');
class ShowQuiz_Controller extends Base_Controller {

    public function __construct() {
        parent::__construct(false);
        $this->load->model('quizzes_model');
        $this->load->model('options_model');
    }

    /*
     * Routes
     */

    public function index() {
         $quizzes['quizzes'] = $this->quizzes_model->read();
        $this->load_view('quizzes/index',$quizzes);
    }

    public function create() {
        $this->load_view('admin/quizzes/create_quiz');
    }

    public function update() {
        $this->load_view('admin/quizzes/update_quiz');
    }

    public function view($_quiz_id){
        $questions = $this->quizzes_model->get_quiz_questions($_quiz_id);        
        foreach($questions as $key =>$question){            
            $questions[$key]->options = $this->options_model->get_options_for_question($question->question_id);
        }
    
        $data['questions'] = $questions;
        $data['quiz_id'] = $_quiz_id;
        $this->load_view('quizzes/show',$data);
    }

    public function result(){
        $options_post = $this->input->post();
        $quiz_id = $this->input->post('quiz_id');
        array_pop($options_post);
        $options = array();
        foreach ($options_post as $question => $option_id){
            $options[] = $option_id;
        }
        $options = array_reverse($options); // Como os testes descrito na historia sugere, a contagem vale pela ultima alternativa até a primeira.
        $options_count = array_count_values($options); // Count repeated options
        arsort($options_count); // order by most repeated 
        reset($options_count); // point to first element
        $most_selected_option_id = key($options_count);  // get key of first element  
        $data["result"] = $this->options_model->get_result($most_selected_option_id);
        $this->load_view('quizzes/result',$data);
    }

    /*
     * Methods
     */

    public function fetch_quizzes() {
        $quizzes = $this->quizzes_model->read();
        echo json_encode($quizzes['quizzes']);
    }

    public function search_quizzes() {
        $search_field = $this->input->post('name_quiz');
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
