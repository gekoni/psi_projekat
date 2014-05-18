<?php

namespace Entity;

/**
 * Description of Korisnik
 *
 * @author Aleksa
 */

/**
 * User Model
 *
 * @Entity
 * @Table(name = "korisnik")
 */
class Korisnik {
    /**
     * @Id
     * @Column(type = "integer", nullable = false)
     * @GeneratedValue(strategy = "AUTO")
     */
    protected $id;

    /**
     * @Column(type = "string", length = 50, unique = true, nullable = false)
     */
    protected $username;
    
    /**
     * @Column(type = "string", length = 50, nullable = false)
     */
    protected $lozinka;
    
    /**
     * @Column(type = "string", length = 50, nullable = false)
     */
    protected $ime;
    
    /**
     * @Column(type = "string", length = 50, nullable = false)
     */
    protected $prezime;

    /**
     * @Column(type = "string", length = 255, unique = true, nullable = false)
     */
    protected $email;
    
    /**
     * @Column(type = "string", length = 50, nullable = false)
     */
    protected $ulica;
    
    /**
     * @Column(type = "integer", nullable = false)
     */
    protected $broj;
    
    /**
     * @Column(type = "string", length = 50, nullable = false)
     */
    protected $grad;
    
    /**
     * @Column(type = "string", length = 50, nullable = false)
     */
    protected $telefon;

    /**
     * @ManyToOne(targetEntity = "Uloga", inversedBy = "korisnici")
     */
    protected $uloga;
    
    /**
     * @OneToMany(targetEntity = "Clanak", mappedBy = "clanci")
     */
    protected $clanci;
    
    /**
     * @ManyToMany(targetEntity = "Oblast", mappedBy = "urednici")
     */
    protected $oblastii;
    
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getLozinka() {
        return $this->lozinka;
    }

    public function getIme() {
        return $this->ime;
    }

    public function getPrezime() {
        return $this->prezime;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUlica() {
        return $this->ulica;
    }

    public function getBroj() {
        return $this->broj;
    }

    public function getGrad() {
        return $this->grad;
    }

    public function getTelefon() {
        return $this->telefon;
    }

    public function getUloga() {
        return $this->uloga;
    }

    public function getClanci() {
        return $this->clanci;
    }

    public function getOblastii() {
        return $this->oblastii;
    }


    
    
}

