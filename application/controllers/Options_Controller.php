<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include('Base_Controller.php');

class Options_Controller extends Base_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('options_model');
        
    }

    /*
     * Routes Methods
     */

    public function index() {
        $this->load_view('admin/options/index');
    }

    public function create() {   
       $this->load->model('questions_model');
        $data['questions'] = $this->questions_model->read();
        $this->load->model('results_model');
        $data['results'] = $this->results_model->read();           
        $this->load_view('admin/options/create_option',$data);
    }

    /*
     * Methods
     */
    
    public function fetch_options() {
        $results = $this->options_model->read();        
        echo json_encode($results);
    }
    
    public function save(){
        $data['option_description'] = $this->input->post('option_description');
        $data['question_id'] = $this->input->post('question_id');
        $data['result_id'] = $this->input->post('result_id');
        $this->options_model->save($data);
        redirect('options');        
    }

}
