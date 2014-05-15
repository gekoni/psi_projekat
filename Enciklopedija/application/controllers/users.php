<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    public function index() {
        $this->login();
    }

    public function login() {
        $data['main_content'] = 'login_view';
        $this->load->view('template', $data);
    }

    public function registracija() {
        $data['main_content'] = 'registracija_view';
        $this->load->view('template', $data);
    }

}
