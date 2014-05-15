<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clanak extends CI_Controller {

    public function index() {
        $this->pretraga();
    }

    public function istorija() {
        $data['main_content'] = 'istorijaclanka_view';
        $this->load->view('template', $data);
    }

    public function izmena() {
        $data['main_content'] = 'izmenaclanka_view';
        $this->load->view('template', $data);        
    }

    public function pregled() {
        $data['main_content'] = 'pregledclanka_view';
        $this->load->view('template', $data);
    }

    public function novi() {
        $data['main_content'] = 'noviclanak_view';
        $this->load->view('template', $data);
    }

    public function pretraga() {
        $data['main_content'] = 'pretragaclanka_view';
        $this->load->view('template', $data);
    }

}
