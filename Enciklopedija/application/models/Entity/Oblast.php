<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="oblast")
 */
class Oblast {

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
     * @OneToMany(targetEntity = "Clanak", mappedBy = "oblast", cascade={"remove"})
     */
    protected $clanci;

    /**
     * @ManyToMany(targetEntity = "Korisnik", inversedBy = "oblasti")
     */
    protected $urednici;

    public function getId() {
        return $this->id;
    }

    public function getNaziv() {
        return $this->naziv;
    }

    public function setNaziv($naziv) {
        $this->naziv = $naziv;
    }

    public function getClanci() {
        return $this->clanci;
    }

    public function getUrednici() {
        return $this->urednici;
    }

    public function dodajUrednika($urednik) {
        $this->urednici [] = $urednik;
    }

    public function izbaciUrednika($urednik) {
        return $this->urednici->removeElement($urednik);
    }

}
