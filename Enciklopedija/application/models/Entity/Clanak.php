<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="clanak")
 */
class Clanak {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=45, unique=false, nullable=true)
     */
    protected $naslov;

    /**
     * @Column(type="text", unique=false, nullable=true)
     */
    protected $sadrzaj;

    /**
     * @Column(type="date", unique=false, nullable=true)
     */
    protected $datum;

    /**
     * @Column(type="time", unique=false, nullable=true)
     */
    protected $vreme;

    /**
     * @Column(type="integer", unique=false, nullable=true)
     */
    protected $brpregleda;

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

    public function getNaslov() {
        return $this->naslov;
    }

    public function getSadrzaj() {
        return $this->sadrzaj;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTime() {
        return $this->time;
    }

    public function getBrpregleda() {
        return $this->brpregleda;
    }

    public function getKorisnik_id() {
        return $this->korisnik_id;
    }

    public function getOblast_id() {
        return $this->oblast_id;
    }

    public function setNaslov($naslov) {
        $this->naslov = $naslov;
    }

    public function setSadrzaj($sadrzaj) {
        $this->sadrzaj = $sadrzaj;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    public function setBrpregleda($brpregleda) {
        $this->brpregleda = $brpregleda;
    }

    public function setKorisnik_id($korisnik_id) {
        $this->korisnik_id = $korisnik_id;
    }

    public function setOblast_id($oblast_id) {
        $this->oblast_id = $oblast_id;
    }

}
