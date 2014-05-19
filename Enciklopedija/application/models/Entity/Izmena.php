<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="izmena")
 */
class Izmena {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="date", unique=false, nullable=true)
     */
    protected $date;

    /**
     * @Column(type="time", unique=false, nullable=true)
     */
    protected $vreme;

    /**
     * @ManyToOne(targetEntity = "Korisnik")
     */
    protected $korisnik;

    /**
     * @ManyToOne(targetEntity = "Clanak", inversedBy = "izmene", cascade={"remove"})
     */
    protected $clanak;

    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getVreme() {
        return $this->vreme;
    }

    public function getKorisnik() {
        return $this->korisnik;
    }

    public function getClanak() {
        return $this->clanak;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setVreme($vreme) {
        $this->vreme = $vreme;
    }

    public function setKorisnik($korisnik) {
        $this->korisnik = $korisnik;
    }

    public function setClanak($clanak) {
        $this->clanak = $clanak;
    }

}
