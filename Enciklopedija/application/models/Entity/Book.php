<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="book")
 */
class Book {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", nullable=false)
     */
    protected $name;

    /**
     * @ManyToOne(targetEntity = "Person", inversedBy = "booksAuthored")
     */
    protected $primaryAuthor;

    /**
     *  
     * @ManyToMany(targetEntity="Person",
     *       inversedBy="booksCoAuthored")
     */
    protected $coauthors;
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrimaryAuthor() {
        return $this->primaryAuthor;
    }

    public function getCoauthors() {
        return $this->coauthors;
    }

    public function setName($username) {
        $this->name = $username;
    }

    public function setPrimaryAuthor($primaryAuthor) {
        $this->primaryAuthor = $primaryAuthor;
        $primaryAuthor->authoredBook($this); //nije obavezno
    }

    public function addToCoauthor($coauthor) {
        $this->coauthors []= $coauthor;
        // obavezno, inače se asocijacija ne vidi
        // dok se flush() ne pozove
        //$coauthor->coauthoredBook($this);
    }
}
