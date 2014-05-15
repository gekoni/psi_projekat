<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="uredjivanje")
 */
class Uredjivanje {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity = "Korisnik")
     */
    protected $korisnik_id;

    /**
     * @ManyToOne(targetEntity = "Oblast")
     */
    protected $oblast_id;

    public function getId() {
        return $this->id;
    }

    public function getKorisnik_id() {
        return $this->korisnik_id;
    }

    public function getOblast_id() {
        return $this->oblast_id;
    }

    public function setKorisnik_id($korisnik_id) {
        $this->korisnik_id = $korisnik_id;
    }

    public function setOblast_id($oblast_id) {
        $this->oblast_id = $oblast_id;
    }

}
