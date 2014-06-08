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
        $idClanka = $this->input->post('idClanka');
        $em = $this->doctrine->em;
        $clanak = $em->find("Entity\Clanak", $idClanka);
        $izmene = $em->getRepository('Entity\Izmena')->
                findBy(array('clanak' => $clanak));
        $this->loadPage('templateUser', 'istorijaclanka_view', array('clanak' => $clanak, 'izmene' => $izmene));
    }

    public function izmena() {
        $idClanka = $this->input->post('idClanka');
        $em = $this->doctrine->em;
        $clanak = $em->find("Entity\Clanak", $idClanka);
        $this->loadPage('templateUser', 'izmenaclanka_view', array('clanak' => $clanak, 'poruka' => ''));
    }

    public function izmenaSubmit() {
        $idClanka = $this->input->post('idClanka');
        $sadrzaj = $this->input->post('sadrzaj');
        $em = $this->doctrine->em;
        $clanak = $em->find("Entity\Clanak", $idClanka);

        $korisnikSession = $this->session->userdata('korisnik');
        $korisnikId = $korisnikSession['korisnikId'];
        $korisnik = $em->find("Entity\Korisnik", $korisnikId);

        $datestring = "%Y-%m-%d";
        $timestring = "%h:%i";

        if ($korisnik->checkIfUrednik($clanak->getOblast()) Or $korisnik->getUloga() == 'admin') {
            $clanak->setSadrzaj($sadrzaj);
            $em->persist($clanak);

            $izmena = new Entity\Izmena();
            $izmena->setClanak($clanak);
            $izmena->setKorisnik($korisnik);
            $izmena->setDate(new DateTime());
            $em->persist($izmena);

            $em->flush();
            $poruka = 'Uspesno ste izmenili clanak.';
        } else {
            $zahtev = new Entity\ZahtevZaIzmenu();
            $zahtev->setClanak($clanak);
            $zahtev->setKorisnik($korisnik);
            $zahtev->setSadrzaj($sadrzaj);
            $zahtev->setDate(new DateTime());
            $em->persist($zahtev);
            $em->flush();
            $poruka = 'Vasa izmena ceka odobrenje urednika.';
        }

        $this->loadPage('templateUser', 'izmenaclanka_view', array('clanak' => $clanak, 'poruka' => $poruka));
    }

    public function pregled() {
        $idClanka = $this->input->get('idClanka');
        $em = $this->doctrine->em;
        $clanak = $em->find("Entity\Clanak", $idClanka);
        $this->loadPage('templateUser', 'pregledclanka_view', array('clanak' => $clanak, 'poruka' => ''));
    }

    public function oceni() {
        $ocena = $this->input->post('ocena');
        $idClanka = $this->input->post('idClanka');
        $em = $this->doctrine->em;
        $clanak = $em->find("Entity\Clanak", $idClanka);
        if ($ocena == 'Ocenite clanak') {
            $poruka = 'Izaberite ocenu iz liste!';
        } else {
            $korisnikSession = $this->session->userdata('korisnik');
            $korisnikId = $korisnikSession['korisnikId'];
            $korisnik = $em->find("Entity\Korisnik", $korisnikId);

            $isOk = $clanak->oceni($em, $ocena, $korisnik);
            if ($isOk) {
                $poruka = "Uspesno ste ocenili clanak ocenom $ocena";
            } else {
                $poruka = 'Greska prilikom ocene clanka.';
            }
        }
        $this->loadPage('templateUser', 'pregledclanka_view', array('clanak' => $clanak, 'poruka' => $poruka));
    }

    public function novi() {
        $this->loadPage('templateUser', 'noviclanak_view', array('oblasti' => $this->oblasti));
    }

    public function noviSubmit() {
        $naslov = $this->input->post('naslov');
        $oblast_name = $this->input->post('oblast');
        $sadrzaj = $this->input->post('sadrzaj');

        if ($this->validate()) {
            $em = $this->doctrine->em;

            $oblast = $em->getRepository('Entity\Oblast')->findOneByNaziv($oblast_name);

            $korisnikSession = $this->session->userdata('korisnik');
            $korisnikId = $korisnikSession['korisnikId'];
            $autor = $em->find("Entity\Korisnik", $korisnikId);

            $clanak = new Entity\Clanak();
            $clanak->setNaslov($naslov);
            $clanak->setAutor($autor);
            $clanak->setBrpregleda(0);
            $clanak->setOblast($oblast);
            $clanak->setSadrzaj($sadrzaj);
            $clanak->setDatum(new DateTime());

            $em->persist($clanak);
            $em->flush();
            $this->pretragaIndex();
            return;
        }
        $this->novi();
    }

    private function validate() {
        $this->form_validation->set_message('required', 'Morate popuniti polje %s. ');

        $this->form_validation->set_rules('naslov', 'Naslov', 'required|max_length[45]|callback_naslovExists');

        return $this->form_validation->run();
    }

    public function naslovExists() {
        $naslov = $this->input->post('naslov');

        $this->form_validation->set_message('naslovExists', 'Vec postoji clanak sa tim naslovom.');

        $em = $this->doctrine->em;
        $clanak = $em->getRepository('Entity\Clanak')->
                findOneBy(array('naslov' => $naslov));
        if ($clanak == NULL) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function pretragaIndex() {
        $this->loadPage('templateUser', 'pretragaclanka_view', array('clanci' => NULL, 'oblasti' => $this->oblasti
            , 'naslov' => '', 'autor' => '', 'sadrzaj' => ''));
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

        if ($oblast_name != 'Oblast') {
            $oblast = $em->getRepository('Entity\Oblast')->findOneByNaziv($oblast_name);
            $params['oblast'] = $oblast;
        }

        $clanci2 = $em->getRepository('Entity\Clanak')->
                findBy($params);

        $clanci = array();

        foreach ($clanci2 as $clanak) {
            if ($sadrzaj != '' && strpos($clanak->getSadrzaj(), $sadrzaj) === false) {
                continue;
            }

            array_push($clanci, $clanak);
        }

        $this->loadPage('templateUser', 'pretragaclanka_view', array('clanci' => $clanci, 'oblasti' => $this->oblasti
            , 'naslov' => $naslov, 'autor' => $autor_name, 'sadrzaj' => $sadrzaj));
    }

    private function loadPage($templateName, $pageName, $dataArray) {
        $data['main_content'] = $pageName;
        $data['podaci'] = $dataArray;
        $this->load->view($templateName, $data);
    }

}
