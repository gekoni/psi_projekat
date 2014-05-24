<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Zahtevi extends CI_Controller {

    public function index() {
        $this->izmene();
    }

    public function izmene() {
        $em = $this->doctrine->em;

        $dql = "SELECT i FROM  Entity\ZahtevZaIzmenu i";
        $query = $em->createQuery($dql);
        $query->setMaxResults(30);
        $izmene = $query->getResult();
        //var_dump($izmene);

        $data['main_content'] = 'zahteviizmene_view';
        $data['podaci'] = $izmene;
        $this->load->view('templateUser', $data);
    }

    public function pogledajIzmenu($izmenaId) {
        $em = $this->doctrine->em;
        $izmena = $em->find("Entity\ZahtevZaIzmenu", (int) $izmenaId);
        if ($izmena != NULL) {
            $data['main_content'] = 'pregledclanka_view';
            $data['podaci'] = $izmena;
            $this->load->view('templateUser', $data);
        } else {
            // vrati se nazad na stranicu sa zahtevima za izmene
            //$this->izmene();
            redirect('/zahtevi/izmene');
        }
    }

    public function pogledajOriginal($originalId) {
        $em = $this->doctrine->em;
        $original = $em->find("Entity\Clanak", (int) $originalId);
        if ($original != NULL) {
            $data['main_content'] = 'pregledclanka_view';
            $data['podaci'] = $original;
            $this->load->view('templateUser', $data);
        } else {
            // vrati se nazad na stranicu sa zahtevima za izmene
            //$this->izmene();
            redirect('/zahtevi/izmene');
        }
    }

    public function odobriIzmenu($izmenaId) {
        $em = $this->doctrine->em;
        $izmena = $em->find("Entity\ZahtevZaIzmenu", (int) $izmenaId);
        if ($izmena != NULL) {
            $noviSadrzaj = $izmena->getSadrzaj();
            $clanakID = $izmena->getClanak()->getId();
            $em = $this->doctrine->em;
            $clanak = $em->find("Entity\Clanak", (int) $clanakID);
            $clanak->setSadrzaj($noviSadrzaj);
            $istorijaIzmene = new \Entity\Izmena();
            $istorijaIzmene->setClanak($clanak);
            $istorijaIzmene->setKorisnik($izmena->getKorisnik());
            $istorijaIzmene->setDate($izmena->getDate()); // new DateTime() za trenutno datum
            $istorijaIzmene->setVreme($izmena->getVreme()); // new DateTime() za trenutno vreme
            $em->persist($istorijaIzmene);
            $em->persist($clanak);
            $em->remove($izmena);
            try {
                $em->flush();
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
                echo "Izmena sadrzaja clanka: \n\n";
            }
            // vrati se nazad na stranicu sa zahtevima za izmene 
            //$this->izmene();
            redirect('/zahtevi/izmene');
        } else {
            // vrati se nazad na stranicu sa zahtevima za izmene 
            //$this->izmene();
            redirect('/zahtevi/izmene');
        }
    }

    public function registracije() {
        $em = $this->doctrine->em;

        $dql = "SELECT i FROM  Entity\ZahtevZaRegistraciju i";
        $query = $em->createQuery($dql);
        $query->setMaxResults(30);
        $registracije = $query->getResult();

        $data['main_content'] = 'zahteviregistracije_view';
        $data['podaci'] = $registracije;
        $this->load->view('templateUser', $data);
    }

    public function prihvatiRegistraciju($registracijaId) {
   $em = $this->doctrine->em;
        $zahtev = $em->find("Entity\ZahtevZaRegistraciju", (int) $registracijaId);
        if ($zahtev != NULL) {
            $korisnik = new Entity\Korisnik();
            $korisnik->setUsername($zahtev->getUsername());
            $korisnik->setLozinka($zahtev->getLozinka());
            $korisnik->setIme($zahtev->getIme());
            $korisnik->setPrezime($zahtev->getPrezime());
            $korisnik->setUlica($zahtev->getUlica());
            $korisnik->setBroj($zahtev->getBroj());
            $korisnik->setGrad($zahtev->getGrad());
            $korisnik->setTelefon($zahtev->getTelefon());
            $korisnik->setEmail($zahtev->getEmail());
            
            $uloga = $em->getRepository('Entity\Uloga')->findOneBy(array('uloga' => 'korisnik'));
            $korisnik->setUloga($uloga);
            $em->persist($korisnik);
            $em->remove($zahtev);
            try {
                $em->flush();
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
                echo "Odbacivanje registracije \n\n";
            }
            // vrati se nazad na stranicu sa zahtevima za registraciju
            //$this->registracije();
            redirect('/zahtevi/registracije'); //redirect('/zahtevi/registracije', 'refresh');
        } else {
            // vrati se nazad na stranicu sa zahtevima za izmene
            //$this->registracije();
            redirect('/zahtevi/registracije'); //redirect('/zahtevi/registracije', 'refresh');
        }
    }

    public function odbaciRegistraciju($registracijaId) {
        $em = $this->doctrine->em;
        $zahtev = $em->find("Entity\ZahtevZaRegistraciju", (int) $registracijaId);
        if ($zahtev != NULL) {
            $odbijenZahtev = new Entity\OdbijenZahtev();
            $odbijenZahtev->setUsername($zahtev->getUsername());
            $odbijenZahtev->setIme($zahtev->getIme());
            $odbijenZahtev->setPrezime($zahtev->getPrezime());
            $odbijenZahtev->setUlica($zahtev->getUlica());
            $odbijenZahtev->setBroj($zahtev->getBroj());
            $odbijenZahtev->setGrad($zahtev->getGrad());
            $odbijenZahtev->setTelefon($zahtev->getTelefon());
            $odbijenZahtev->setEmail($zahtev->getEmail());
            
            $uloga = $em->getRepository('Entity\Uloga')->findOneBy(array('uloga' => 'korisnik'));
            $odbijenZahtev->setUloga($uloga);
            $em->persist($odbijenZahtev);
            $em->remove($zahtev);
            try {
                $em->flush();
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
                echo "Odbacivanje registracije \n\n";
            }
            // vrati se nazad na stranicu sa zahtevima za registraciju
            //$this->registracije();
            redirect('/zahtevi/registracije'); //redirect('/zahtevi/registracije', 'refresh');
        } else {
            // vrati se nazad na stranicu sa zahtevima za izmene
            //$this->registracije();
            redirect('/zahtevi/registracije'); //redirect('/zahtevi/registracije', 'refresh');
        }
    }

}
