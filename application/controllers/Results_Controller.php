<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include('Base_Controller.php');

class Results_Controller extends Base_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('results_model');
    }

    /*
     * Routes
     */

    public function index() {
        $this->load_view('admin/results/index');
    }

    public function create() {
        $this->load->model('quizzes_model');
        $data['quizzes'] = $this->quizzes_model->read();        
        $this->load_view('admin/results/create_result',$data);
    }

    public function update() {
        $this->load_view('admin/results/update_result');
    }

    /*
     * Methods
     */

    public function fetch_results() {
        $results = $this->results_model->read();
        echo json_encode($results);
    }

    public function search_results() {
        $search_field = $this->input->post('result_name');
        $results = $this->results_model->search($search_field);
        echo json_encode($results['results']);
    }
    
    public function save(){
        $data['result_name'] = $this->input->post('result_name');
        $data['result_description'] = $this->input->post('result_description');
        $data['quiz_id'] = $this->input->post('quiz_id');
        $this->results_model->save($data);
        redirect('results');        
    }
    


}
