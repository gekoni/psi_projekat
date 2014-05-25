<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $korisnikSession = $this->session->userdata('korisnik');
        if ($korisnikSession == NULL) {
            exit('No direct script access allowed');
        }
    }

    public function index() {
        $em = $this->doctrine->em;
        $korisnikSession = $this->session->userdata('korisnik');
        $korisnikId = $korisnikSession['korisnikId'];
        $korisnik = $em->getRepository('Entity\Korisnik')->findOneBy(array('id' => $korisnikId));

        $podaci['ime'] = $korisnik->getIme();
        $podaci['prezime'] = $korisnik->getPrezime();
        $podaci['ulica'] = $korisnik->getUlica();
        $podaci['broj'] = $korisnik->getBroj();
        $podaci['grad'] = $korisnik->getGrad();
        $podaci['telefon'] = $korisnik->getTelefon();

        $data['main_content'] = 'profil_promena_view';
        $data['podaci'] = $podaci;
        $this->load->view('templateUser', $data);
    }

    public function promeniPodatke() {
        if ($_POST) {
            $config = array(
                array(
                    'field' => 'ime',
                    'label' => 'Ime',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'prezime',
                    'label' => 'Prezime',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'ulica',
                    'label' => 'Ulica',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'broj',
                    'label' => 'Broj',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'grad',
                    'label' => 'Grad',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'telefon',
                    'label' => 'Telefon',
                    'rules' => 'required|numeric'
                )
            );

            $this->form_validation->set_message('required', 'Polje "%s" ne moze biti prazno!');
            $this->form_validation->set_message('numeric', 'Polje "%s" moze da sadrzi samo brojeve!');
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false) {
                $data['errors'] = validation_errors();
                $data['main_content'] = 'profil_promena_view';
                $data['podaci'] = array();
                $this->load->view('templateUser', $data);
            } else {
                $em = $this->doctrine->em;
                $korisnikSession = $this->session->userdata('korisnik');
                $korisnikId = $korisnikSession['korisnikId'];
                $korisnik = $em->getRepository('Entity\Korisnik')->findOneBy(array('id' => $korisnikId));
                $korisnik->setIme($_POST['ime']);
                $korisnik->setPrezime($_POST['prezime']);
                $korisnik->setUlica($_POST['ulica']);
                $korisnik->setBroj($_POST['broj']);
                $korisnik->setGrad($_POST['grad']);
                $korisnik->setTelefon($_POST['telefon']);

                $em->persist($korisnik);
                try {
                    $em->flush();
                } catch (Exception $e) {
                    echo 'Caught exception: ', $e->getMessage(), "\n";
                    echo "Korisnik: \n\n";
                }
                $data['main_content'] = 'profil_promena_view';
                $podaci['uspesna_izmena'] = TRUE;
                $data['podaci'] = $podaci;
                $this->load->view('templateUser', $data);
            }
        }
    }

    public function promeni_sifru() {
        if ($_POST) {
            $config = array(
                array(
                    'field' => 'lozinka_stara',
                    'label' => 'Stara lozinka',
                    'rules' => 'trim|required|min_length[3]|callback_staraLozinkaProvera'
                ),
                array(
                    'field' => 'lozinka_nova',
                    'label' => 'Nova lozinka',
                    'rules' => 'trim|required|min_length[3]'
                ), array(
                    'field' => 'lozinka_ponovo',
                    'label' => 'Nova lozinka potvrda',
                    'rules' => 'trim|required|min_length[3]|matches[lozinka_nova]'
                )
            );

            $this->form_validation->set_message('required', 'Polje "%s" ne moze biti prazno!');
            $this->form_validation->set_message('min_length', 'Polje "%s" mora da sadrzi bar %s karaktera!');
            $this->form_validation->set_message('matches', 'Polje "%s" mora biti isto kao i polje "%s"');
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false) {
                $data['errors'] = validation_errors();
                $data['main_content'] = 'profil_promena_view';
                $data['podaci'] = array();
                $this->load->view('templateUser', $data);
            } else {
                $em = $this->doctrine->em;
                $korisnikSession = $this->session->userdata('korisnik');
                $korisnikId = $korisnikSession['korisnikId'];
                $korisnik = $em->getRepository('Entity\Korisnik')->findOneBy(array('id' => $korisnikId));
                $korisnik->setLozinka($_POST['lozinka_nova']);

                $em->persist($korisnik);
                try {
                    $em->flush();
                } catch (Exception $e) {
                    echo 'Caught exception: ', $e->getMessage(), "\n";
                    echo "Korisnik: \n\n";
                }
                $data['main_content'] = 'profil_promena_view';
                $podaci['uspesna_izmena_lozinke'] = TRUE;
                $data['podaci'] = $podaci;
                $this->load->view('templateUser', $data);
            }
        }
    }

    function staraLozinkaProvera($lozinka_stara) {
        $em = $this->doctrine->em;
        $korisnikSession = $this->session->userdata('korisnik');
        $korisnikId = $korisnikSession['korisnikId'];
        $korisnik = $em->getRepository('Entity\Korisnik')->findOneBy(array('id' => $korisnikId));
       if ($korisnik->getLozinka() != $lozinka_stara) {
            $this->form_validation->set_message('staraLozinkaProvera', 'Stara lozinka nije tacna!');
            return false;
        } else {
            return true;
        }
    }

}
