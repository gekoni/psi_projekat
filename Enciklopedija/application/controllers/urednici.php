<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Urednici extends CI_Controller {

    public function index() {
        $data['main_content'] = 'urednici_view';
        $data['podaci'] = array('oblasti' => $this->populatedropdownOblasti(), 'korisnici' => $this->populatedropdownKorisnici());
        $this->load->view('template', $data);
    }

    function populatedropdownKorisnici() {
        $em = $this->doctrine->em;
        $dql = "SELECT i FROM  Entity\Korisnik i";
        $query = $em->createQuery($dql);
        $korisnici = $query->getResult();

        $dropDownList[''] = 'Izaberite korisnika';    // default selection item
        if ($korisnici != NULL) {
            foreach ($korisnici as $korisnik) {
                $dropDownList[$korisnik->getId()] = $korisnik->getIme() . ' ' . $korisnik->getPrezime();
            }
        }
        return $dropDownList;
    }

    function populatedropdownOblasti() {
        $em = $this->doctrine->em;
        $dql = "SELECT i FROM  Entity\Oblast i";
        $query = $em->createQuery($dql);
        $oblasti = $query->getResult();

        $dropDownList[''] = 'Izaberite oblast';
        if ($oblasti != NULL) {
            foreach ($oblasti as $oblast) {
                $dropDownList[$oblast->getId()] = $oblast->getNaziv();
            }
        }
        return $dropDownList;
    }

    function dodajUrednika() {
        $config = array();
        if ($_POST) {
            $config = array(
                array(
                    'field' => 'korisnik',
                    'label' => 'Korisnik',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'oblast',
                    'label' => 'Oblast',
                    'rules' => 'required'
            ));
        }
        $this->form_validation->set_message('required', 'Polje "%s" ne moze biti prazno!');
        //$this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $data['errors'] = validation_errors();
            $data['main_content'] = 'urednici_view';
            $data['podaci'] = array();
            $this->load->view('template', $data);
        } else {
            $oblastID = $_POST['oblast'];
            var_dump($oblastID);
            $urednikID = $_POST['korisnik'];
            $em = $this->doctrine->em;
            $role = $em->getRepository('Entity\Oblast')->findOneBy(array('id' => $oblastID));
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

    function obrisiUrednika($Id) {
        redirect('/urednici'); //redirect('/urednici', 'refresh');
    }

}
