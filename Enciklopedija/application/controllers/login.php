<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {

        // Kreiranje novog objekta
        /*      $em = $this->doctrine->em;
          $role = new Entity\Uloga();
          $role->setUloga("admin");
          $em->persist($role);
          $em->flush(); */

        // Pretraga po id-u i po raznim kriterijumima
        //$em = $this->doctrine->em;
        //$role = $em->find("Entity\Uloga", 1); 
        //$role = $em->getRepository('Entity\Uloga')->findOneBy(array('uloga' => 'admin'));
        //$roleName = $role->getUloga();
        // Brisanje, nakon sto je objekat dohvacen iz baze
        // $em->remove($role);
        // $em-> flush();
        // Za update se dohvati objekat, menja se sta treba, i onda flush
        // Mozda treba persist pre flusha, nisam siguran, mrzi me sad da proveravam :)

        if ($this->session->userdata('korisnik')) {
            $this->loadPage('templateUser', 'welcome_view', array());
        } else {
            $this->loadPage('template', 'login_view', array());
        }
    }

    public function auth() {
        if ($this->validate() == FALSE) {
            $this->index();
            return;
        }
        $this->loadPage('templateUser', 'welcome_view', array());
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->loadPage('template', 'login_view', array());
    }

    private function validate() {
        $this->form_validation->set_message('required', 'Morate popuniti polje %s. ');

        $this->form_validation->set_rules('username', 'Username', 'required|max_length[45]|callback_userExists');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[45]');

        return $this->form_validation->run();
    }

    public function userExists() {
        $password = $this->input->post('password');
        $username = $this->input->post('username');

        $this->form_validation->set_message('userExists', 'Pogresno korisnicko ime ili lozinka.');

        $em = $this->doctrine->em;
        $korisnik = $em->getRepository('Entity\Korisnik')->
                findOneBy(array('username' => $username, 'lozinka' => $password));
        if ($korisnik == NULL) {
            return FALSE;
        } else {
            $korisnikSession = array();
            $korisnikSession['uloga'] = $korisnik->getUloga()->getUloga();
            $korisnikSession['korisnikId'] = $korisnik->getId();
            $this->session->set_userdata('korisnik', $korisnikSession);
            return TRUE;
        }
    }

    public function continueAsUnregistered() {
        $this->loadPage('templateUser', 'welcome_view', array());
    }

    private function loadPage($templateName, $pageName, $dataArray) {
        $data['main_content'] = $pageName;
        $data['podaci'] = $dataArray;
        $this->load->view($templateName, $data);
    }

}
