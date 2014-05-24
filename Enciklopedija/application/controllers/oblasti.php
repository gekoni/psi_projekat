<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Oblasti extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->authorize('admin');
    }

    private function authorize($ulogaString) {
        $korisnikSession = $this->session->userdata('korisnik');
        if ($korisnikSession == NULL) {
            exit('No direct script access allowed');
        } else {
            $uloga = $korisnikSession['uloga'];
            if ($uloga != $ulogaString) {
                redirect('/login');
            }
        }
    }

    public function index() {

        $oblasti = $this->sveOblasti();

        $data['main_content'] = 'oblasti_view';
        $data['podaci'] = array('novi' => true, 'oblasti' => $oblasti);
        $this->load->view('templateUser', $data);
    }

    public function sveOblasti() {
        $em = $this->doctrine->em;

        $dql = "SELECT i FROM  Entity\Oblast i";
        $query = $em->createQuery($dql);
        $query->setMaxResults(100);
        $oblasti = $query->getResult();
        return $oblasti;
    }

    public function dodajOblast() {
        $config = array();
        if ($_POST) {
            $config = array(
                array(
                    'field' => 'naziv',
                    'label' => 'Naziv',
                    'rules' => 'required|callback_daLiPostojiOblast'
            ));
        }
        $this->form_validation->set_message('required', 'Polje "%s" ne moze biti prazno!');
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $data['errors'] = validation_errors();
            $data['main_content'] = 'oblasti_view';
            $data['podaci'] = array('oblasti' => $this->sveOblasti());
            $this->load->view('templateUser', $data);
        } else {
            $oblast = new Entity\Oblast();
            $oblast->setNaziv($_POST['naziv']);
            $em = $this->doctrine->em;
            $em->persist($oblast);
            try {
                $em->flush();
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
                echo "Nova oblast dodata \n\n";
            }
            redirect('/oblasti'); //redirect('/oblasti', 'refresh');
        }
    }

    function daLiPostojiOblast($naziv) {
        $em = $this->doctrine->em;
        $oblast = $em->getRepository('Entity\Oblast')->findOneBy(array('naziv' => $naziv));
        if ($oblast != NULL) {
            $this->form_validation->set_message('daLiPostojiOblast', 'Oblast "' . $naziv . '" vec postoji!');
            return false;
        } else {
            return true;
        }
    }

    public function obrisiOblast($id) {
        $em = $this->doctrine->em;
        $oblast = $em->find("Entity\Oblast", (int) $id);
        if ($oblast != NULL) {
            $em->remove($oblast);
            try {
                $em->flush();
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
                echo "Izmena sadrzaja clanka: \n\n";
            }
        }
        redirect('/oblasti'); //redirect('/oblasti', 'refresh');
    }

}
