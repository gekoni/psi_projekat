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
    protected $korisnik_id;

    /**
     * @ManyToOne(targetEntity = "Clanak")
     */
    protected $clanak_id;

    public function getId() {
        return $this->id;
    }

    public function getOcena() {
        return $this->ocena;
    }

    public function getKorisnik_id() {
        return $this->korisnik_id;
    }

    public function getClanak_id() {
        return $this->clanak_id;
    }

    public function setOcena($ocena) {
        $this->ocena = $ocena;
    }

    public function setKorisnik_id($korisnik_id) {
        $this->korisnik_id = $korisnik_id;
    }

    public function setClanak_id($clanak_id) {
        $this->clanak_id = $clanak_id;
    }

}
