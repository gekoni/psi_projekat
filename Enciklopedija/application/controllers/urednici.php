<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Urednici extends CI_Controller {

    public function index() {
        $this->dodavanje_brisanje();
    }

    public function dodavanje_brisanje() {
        $data['main_content'] = 'urednici_view';
        $this->load->view('template', $data);
    }

}
