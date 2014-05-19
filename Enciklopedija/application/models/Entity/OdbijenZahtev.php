<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entity;

/**
 * Description of OdbijenZahtev
 *
 * @author Aleksa
 */

/**
 * User Model
 *
 * @Entity
 * @Table(name="odbijen_zahtev")
 */
class OdbijenZahtev {

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
     * @ManyToOne(targetEntity = "Uloga")
     */
    protected $uloga;

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
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

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setIme($ime) {
        $this->ime = $ime;
    }

    public function setPrezime($prezime) {
        $this->prezime = $prezime;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setUlica($ulica) {
        $this->ulica = $ulica;
    }

    public function setBroj($broj) {
        $this->broj = $broj;
    }

    public function setGrad($grad) {
        $this->grad = $grad;
    }

    public function setTelefon($telefon) {
        $this->telefon = $telefon;
    }

    public function setUloga($uloga) {
        $this->uloga = $uloga;
    }

}
