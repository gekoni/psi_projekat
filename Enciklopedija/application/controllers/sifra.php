<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sifra extends CI_Controller {

    public function index() {
        $this->promeni();
    }

    public function promeni() {
        $data['main_content'] = 'promenasifre_view';
        $this->load->view('template', $data);
    }

}
