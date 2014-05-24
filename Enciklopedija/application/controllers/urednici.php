<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Urednici extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['main_content'] = 'urednici_view';
        $data['podaci'] = array('oblasti' => $this->populatedropdownOblasti(), 'korisnici' => $this->populatedropdownKorisnici(), 'lista' => $this->uredjivanjeLista());
        $this->load->view('templateUser', $data);
    }

    function uredjivanjeLista() {
        $em = $this->doctrine->em;
        $dql = "SELECT i FROM  Entity\Oblast i";
        $query = $em->createQuery($dql);
        $oblasti = $query->getResult();

        $lista = array();
        for ($i = 0; $i < count($oblasti); $i++) {
            $oblast = $oblasti[$i];
            $urednici = $oblast->getUrednici();
            for ($k = 0; $k < count($urednici); $k++) {
                $urednik = $urednici[$k];
                $element = array();
                $element['ime_prezime'] = $urednik->getIme() . " " . $urednik->getPrezime();
                $element['email'] = $urednik->getEmail();
                $element['username'] = $urednik->getUsername();
                $element['oblast'] = $oblast->getNaziv();
                $element['oblastId'] = $oblast->getId();
                $element['urednikId'] = $urednik->getId();

                $lista [$i] = $element;
            }
        }

        return $lista;
    }

    function populatedropdownKorisnici() {
        $em = $this->doctrine->em;
        $dql = "SELECT i FROM  Entity\Korisnik i";
        $query = $em->createQuery($dql);
        $korisnici = $query->getResult();

        $dropDownList['none'] = 'Izaberite korisnika';    // default selection item
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

        $dropDownList['none'] = 'Izaberite oblast';
        if ($oblasti != NULL) {
            foreach ($oblasti as $oblast) {
                $dropDownList[$oblast->getId()] = $oblast->getNaziv();
            }
        }
        return $dropDownList;
    }

    function dodajUrednika() {

        $oblastID = $_POST['oblasti'];
        $urednikID = $_POST['korisnici'];
        if ($oblastID == 'none' || $urednikID == 'none') {
            $this->validateDodavanje($oblastID, $urednikID);
        } else {
            $em = $this->doctrine->em;
            $oblast = $em->getRepository('Entity\Oblast')->findOneBy(array('id' => $oblastID));
            $korisnik = $em->getRepository('Entity\Korisnik')->findOneBy(array('id' => $urednikID));

            $oblast->dodajUrednika($korisnik);
            $em->persist($oblast);
            try {
                $em->flush();
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
                echo "Nova oblast dodata \n\n";
            }
            redirect('/urednici');
        }
    }

    private function validateDodavanje($oblastID, $urednikID) {
        $podaci = array();
        if ($oblastID == 'none') {
            $podaci['greska_oblast'] = "Izaberite oblast!";
        }
        if ($urednikID == 'none') {
            $podaci['greska_korisnik'] = "Izaberite korisnika!";
        }
        $data['main_content'] = 'urednici_view';
        $podaci['oblasti'] = $this->populatedropdownOblasti();
        $podaci['korisnici'] = $this->populatedropdownKorisnici();
        $podaci['lista'] = $this->uredjivanjeLista();
        $data['podaci'] = $podaci;
        $this->load->view('templateUser', $data);
    }

    function obrisiUrednika($oblastID, $urednikID) {
        $em = $this->doctrine->em;
        $oblast = $em->getRepository('Entity\Oblast')->findOneBy(array('id' => $oblastID));
        $korisnik = $em->getRepository('Entity\Korisnik')->findOneBy(array('id' => $urednikID));

        $oblast->izbaciUrednika($korisnik);
        $em->persist($oblast);
        try {
            $em->flush();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            echo "Nova oblast dodata \n\n";
        }
        redirect('/urednici');
    }

}
