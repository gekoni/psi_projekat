<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Oblasti extends CI_Controller {

    public function index() {
        $this->dodajiprikazi();
    }

    public function dodajiprikazi() {
        $data['main_content'] = 'oblasti_view';
        $this->load->view('template', $data);
    }

}
