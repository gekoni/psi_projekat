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
    
    
}

