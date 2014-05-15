<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="zahtev_za_izmenu")
 */
class ZahtevZaIzmenu {

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
     * @Column(type="text", unique=false, nullable=true)
     */
    protected $sadrzaj;

    /**
     * @ManyToOne(targetEntity = "Korisnik")
     */
    protected $korisnik;

    /**
     * @ManyToOne(targetEntity = "Clanak")
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

    public function getSadrzaj() {
        return $this->sadrzaj;
    }

    public function getKorisnik() {
        return $this->korisnik;
    }

    public function getClanak() {
        return $this->clanak;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setVreme($vreme) {
        $this->vreme = $vreme;
    }

    public function setSadrzaj($sadrzaj) {
        $this->sadrzaj = $sadrzaj;
    }

    public function setKorisnik($korisnik) {
        $this->korisnik = $korisnik;
    }

    public function setClanak($clanak) {
        $this->clanak = $clanak;
    }



}

