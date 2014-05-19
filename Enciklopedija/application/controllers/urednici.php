<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Urednici extends CI_Controller {

    public function index() {
        $data['main_content'] = 'urednici_view';
        $data['podaci'] = array();
        $this->load->view('template', $data);
    }

    public function dodavanje_brisanje() {
        redirect('/urednici'); //redirect('/urednici', 'refresh');
    }

    function obrisiUrednika($Id) {
        
    }

}
