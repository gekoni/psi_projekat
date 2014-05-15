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
    protected $korisnik_id;

    /**
     * @ManyToOne(targetEntity = "Clanak")
     */
    protected $clanak_id;

    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getVreme() {
        return $this->vreme;
    }

    public function getKorisnik_id() {
        return $this->korisnik_id;
    }

    public function getClanak_id() {
        return $this->clanak_id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setVreme($vreme) {
        $this->vreme = $vreme;
    }

    public function setKorisnik_id($korisnik_id) {
        $this->korisnik_id = $korisnik_id;
    }

    public function setClanak_id($clanak_id) {
        $this->clanak_id = $clanak_id;
    }

}
