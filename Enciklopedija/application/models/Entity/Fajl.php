<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="file")
 */
class Fajl {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=45, unique=false, nullable=true)
     */
    protected $naziv;

    /**
     * @Column(type="blob", unique=false, nullable=true)
     */
    protected $sadrzaj;

    /**
     * @ManyToOne(targetEntity = "Clanak")
     */
    protected $clanak_id;

    public function getId() {
        return $this->id;
    }

    public function getNaziv() {
        return $this->naziv;
    }

    public function getSadrzaj() {
        return $this->sadrzaj;
    }

    public function getClanak_id() {
        return $this->clanak_id;
    }

    public function setNaziv($naziv) {
        $this->naziv = $naziv;
    }

    public function setSadrzaj($sadrzaj) {
        $this->sadrzaj = $sadrzaj;
    }

    public function setClanak_id($clanak_id) {
        $this->clanak_id = $clanak_id;
    }

}
