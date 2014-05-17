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
        $em = $this->doctrine->em;
        //$role = $em->find("Entity\Uloga", 1); 
        $role = $em->getRepository('Entity\Uloga')->findOneBy(array('uloga' => 'admin'));

        $roleName = $role->getUloga();
        
        // Brisanje, nakon sto je objekat dohvacen iz baze
        // $em->remove($role);
        // $em-> flush();
        
        // Za update se dohvati objekat, menja se sta treba, i onda flush
        // Mozda treba persist pre flusha, nisam siguran, mrzi me sad da proveravam :)

        $data['main_content'] = 'test';
        $data['podaci'] = array (
            'role'     =>   $roleName
        );
        $this->load->view('template', $data);
    }

}