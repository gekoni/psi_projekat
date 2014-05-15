<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="fajl")
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
     * @ManyToOne(targetEntity = "Clanak", inversedBy = "fajlovi")
     */
    protected $clanak;

    public function getId() {
        return $this->id;
    }

    public function getNaziv() {
        return $this->naziv;
    }

    public function getSadrzaj() {
        return $this->sadrzaj;
    }

    public function getClanak() {
        return $this->clanak;
    }

    public function setNaziv($naziv) {
        $this->naziv = $naziv;
    }

    public function setSadrzaj($sadrzaj) {
        $this->sadrzaj = $sadrzaj;
    }

    public function setClanak($clanak) {
        $this->clanak = $clanak;
    }
}
