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
        $most_selected_option_id = $this->get_most_selected_option($options_post);
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

    public function get_most_selected_option($_options_post){
        $options = array();
        foreach ($_options_post as $question => $option_id){
            $options[] = $option_id;
        }

        $options_reverse = array_reverse($options); 
        $options_count = array_count_values($options_reverse); 
        arsort($options_count);               
        $first_option_count = reset($options_count);
        $first_option_question_id = key($options_count);
        $second_option_count = reset(array_slice($options_count, 1, 1, true));  
        
        //se não há empate manda o que tem mais escolhas
        if($first_option_count > $second_option_count)
            return $first_option_question_id;
        else{
            //Deu empate nas opcoes ex (a,a,b,b,c)
            //usa peso para ver qual a opção correta            
            $values = array(1,3,5,13,16);    
            for($i = 0; $i< 5; $i++){
                $option_value[] = array($options[$i]=>$values[$i]);
            }

            $sumArray = array();
            foreach ($option_value as $key=>$subArray) {
              foreach ($subArray as $id=>$value) {
                $sumArray[$id]+=$value;
              }
            }
            arsort($sumArray);   
          //  var_dump($options);  
          //  var_dump($sumArray); 
            reset($sumArray);
            $first_key = key($sumArray);                     
            return $first_key; 
        }              
    }


}
