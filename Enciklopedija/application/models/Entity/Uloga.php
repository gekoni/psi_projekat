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

    public function setUloga($uloga) {
        $this->uloga = $uloga;
        return $this;
    }

    public function getUloga() {
        return $this->uloga;
    }
}
