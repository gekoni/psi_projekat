<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->model('Entity/Korisnik', 'korisnik');
        
        $korisnici = $this->korisnik->getKorisnici();

        $data['main_content'] = 'test';
        $data['podaci'] = array (
            'korisnici'     =>   $korisnici
        );
        $this->load->view('template', $data);
    }

}
