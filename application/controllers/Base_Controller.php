<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {

    public function __construct($_valida_login = true) {
        $this->valida_login = $_valida_login;
        parent::__construct();
        if ($_valida_login && !$this->session->userdata('is_logged_in'))
            redirect('admin');
    }
    
    public function load_view($view, $vars = array()) {
        if($this->valida_login){
            $this->load->view('admin/includes/nav-header', $vars);
            $this->load->view('admin/includes/side-menu');
            $this->load->view($view, $vars);
            $this->load->view('admin/includes/nav-footer');    
        }else{
            $this->load->view('quizzes/includes/nav-header', $vars);            
            $this->load->view($view, $vars);
            $this->load->view('quizzes/includes/nav-footer');    
        }
        
    }

}


