<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Routes Methods
     */

    public function index() {
        if (!$this->session->userdata('is_logged_in')) {
            $this->load->view('admin/login/index');
        } else {
            redirect('dashboard');
        }
    }

    public function signup() {
        if (!$this->session->userdata('is_logged_in')) {
            $this->load->view('admin/login/signup_form');
        } else {
            redirect('dashboard');
        }
    }

    /*
     * Methods
     */

    public function __encrip_password($password) {
        return md5($password);
    }

    public function auth() {        
        $this->load->model('Users_model');
        $data['username'] = $this->input->post('username');
        $data['password']  = $this->__encrip_password($this->input->post('user_password'));
        $user = $this->Users_model->user_auth($data);
        if (isset($user[0]->username)) {
            $data = array(
                'default_user' => $user[0]->username,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('dashboard');
        } else {
            $data['message_error'] = true;
            $this->load->view('admin/login/index', $data);
        }
    }


    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }

}
