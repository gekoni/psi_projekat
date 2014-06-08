<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="ocena")
 */
class Ocena {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="integer", unique=false, nullable=true)
     */
    protected $ocena;

    /**
     * @ManyToOne(targetEntity = "Korisnik")
     */
    protected $korisnik;

    /**
     * @ManyToOne(targetEntity = "Clanak", inversedBy = "ocene", cascade={"remove"})
     */
    protected $clanak;

    public function getId() {
        return $this->id;
    }

    public function getOcena() {
        return $this->ocena;
    }

    public function getKorisnik() {
        return $this->korisnik;
    }

    public function getClanak() {
        return $this->clanak;
    }

    public function setOcena($ocena) {
        $this->ocena = $ocena;
    }

    public function setKorisnik($korisnik) {
        $this->korisnik = $korisnik;
    }

    public function setClanak($clanak) {
        $this->clanak = $clanak;
    }
}
