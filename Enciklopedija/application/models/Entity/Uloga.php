<?php

namespace Entity;

/**
 * Description of Uloga
 *
 * @author Aleksa
 */

/**
 * User Model
 *
 * @Entity
 * @Table(name = "uloga")
 */
class Uloga {
    /**
     * @Id
     * @Column(type = "integer", nullable = false)
     * @GeneratedValue(strategy = "AUTO")
     */
    protected $id;

    /**
     * @Column(type = "string", length = 50, unique = true, nullable = false)
     */
    protected $uloga;
    
    /**
     * @OneToMany(targetEntity = "Korisnik", mappedBy = "uloga")
     */
    protected $korisnici;

    public function setUloga($uloga) {
        $this->uloga = $uloga;
        return $this;
    }

    public function getUloga() {
        return $this->uloga;
    }
    
    public function getKorisnici() {
        return $this->korisnici;
    }
}
