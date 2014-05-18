<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clanak extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $em = $this->doctrine->em;
        $this->oblasti = $em->getRepository('Entity\Oblast')->
                findAll();
    }

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

    public function pretragaIndex() {
        $this->loadPage('templateUser', 'pretragaclanka_view', array('clanci' => NULL, 'oblasti' => $this->oblasti));
    }

    public function pretragaSubmit() {
        $naslov = $this->input->post('naslov');
        $autor_name = $this->input->post('autor');
        $oblast_name = $this->input->post('oblast');
        $sadrzaj = $this->input->post('sadrzaj');

        $em = $this->doctrine->em;

        $params = array();

        if ($naslov != '') {
            $params['naslov'] = $naslov;
        }

        if ($autor_name != '') {
            $autor = $em->getRepository('Entity\Korisnik')->findOneByUsername($autor_name);
            $params['autor'] = $autor;    
        }
        
        if ($oblast_name != '') {
            $oblast = $em->getRepository('Entity\Oblast')->findOneByNaziv($oblast_name);
            $params['oblast'] = $oblast;    
        }

        $clanci2 = $em->getRepository('Entity\Clanak')->
                findBy($params);
        
        $clanci = array();
        
        foreach ($clanci2 as $clanak) {
            if ($sadrzaj != '' && strpos($clanak->getSadrzaj() , $sadrzaj) === false) { continue; }
        
            array_push($clanci, $clanak);
        }
        
        $this->loadPage('templateUser', 'pretragaclanka_view', array('clanci' => $clanci, 'oblasti' => $this->oblasti));
    }

    private function loadPage($templateName, $pageName, $dataArray) {
        $data['main_content'] = $pageName;
        $data['podaci'] = $dataArray;
        $this->load->view($templateName, $data);
    }

}
