<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registracija extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['main_content'] = 'registracija_view';
        $data['podaci'] = array();
        $this->load->view('template', $data);
    }

    public function registrujSe() {
        //$this->load->library('form_validation');
            
        if ($_POST) {
            $config = array(
                array(
                    'field' => 'username',
                    'label' => 'Korisnicko ime',
                    'rules' => 'trim|required|min_length[3]|callback_daLiPostojiKorisnikUsername'
                ),
                array(
                    'field' => 'lozinka',
                    'label' => 'Lozinka',
                    'rules' => 'trim|required|min_length[3]'
                ),
                array(
                    'field' => 'lozinka_potvrda',
                    'label' => 'Potvrdi lozinku',
                    'rules' => 'trim|required|min_length[3]|matches[lozinka]'
                ),
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
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|valid_email|callback_daLiPostojiKorisnikEmail'
                )
            );
            
            $this->form_validation->set_message('required', 'Polje "%s" ne moze biti prazno!');
            $this->form_validation->set_message('numeric', 'Polje "%s" moze da sadrzi samo brojeve!');
            $this->form_validation->set_message('min_length', 'Polje "%s" mora da sadrzi bar %s karaktera!');
            $this->form_validation->set_message('matches', 'Polje "%s" mora biti isto kao i polje "%s"');
            $this->form_validation->set_message('valid_email', 'Polje "%s" mora sadrzati ispravnu email adresu!');
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false) {
                $data['errors'] = validation_errors();
                $data['main_content'] = 'registracija_view';
                $data['podaci'] = array();
                $this->load->view('template', $data);
            } else {
                $korisnik = new Entity\ZahtevZaRegistraciju();
                $korisnik->setUsername($_POST['username']);
                $korisnik->setLozinka($_POST['lozinka']);
                $korisnik->setIme($_POST['ime']);
                $korisnik->setPrezime($_POST['prezime']);
                $korisnik->setUlica($_POST['ulica']);
                $korisnik->setBroj($_POST['broj']);
                $korisnik->setGrad($_POST['grad']);
                $korisnik->setTelefon($_POST['telefon']);
                $korisnik->setEmail($_POST['email']);

                $em = $this->doctrine->em;
                $uloga = $em->getRepository('Entity\Uloga')->findOneBy(array('uloga' => 'korisnik'));
                $korisnik->setUloga($uloga);
                $em->persist($korisnik);
                try {
                    $em->flush();
                } catch (Exception $e) {
                    echo 'Caught exception: ', $e->getMessage(), "\n";
                    echo "Korisnik: \n\n";
                }
                $data['main_content'] = 'uspesnaregistracija_view';
                $data['podaci'] = array();
                $this->load->view('template', $data);            
            }
        }
    }

    function daLiPostojiKorisnikEmail($email) {
        $em = $this->doctrine->em;
        $korisnik = $em->getRepository('Entity\Korisnik')->findOneBy(array('email' => $email));
        $zahtev = $em->getRepository('Entity\ZahtevZaRegistraciju')->findOneBy(array('email' => $email));
        if ($korisnik != NULL || $zahtev != NULL) {
            $this->form_validation->set_message('daLiPostojiKorisnikEmail', 'Korisnik sa email adresom "' . $email . '" vec postoji!');
            return false;
        } else {
            return true;
        }
    }

    function daLiPostojiKorisnikUsername($username) {
        $em = $this->doctrine->em;
        $korisnik = $em->getRepository('Entity\Korisnik')->findOneBy(array('username' => $username));
        $zahtev = $em->getRepository('Entity\ZahtevZaRegistraciju')->findOneBy(array('username' => $username));
        if ($korisnik != NULL || $zahtev != NULL) {
            $this->form_validation->set_message('daLiPostojiKorisnikUsername', 'Korisnik sa korisnickim imenom "' . $username . '" vec postoji!');
            return false;
        } else {
            return true;
        }
    }

}
