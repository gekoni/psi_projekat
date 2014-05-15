<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Zahtevi extends CI_Controller {

    public function index() {
        $this->izmene();
    }

    public function izmene() {
        $data['main_content'] = 'zahteviizmene_view';
        $this->load->view('template', $data);
    }

    public function registracija() {
        $data['main_content'] = 'zahteviregistracije_view';
        $this->load->view('template', $data);
    }

}
