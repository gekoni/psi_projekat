<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="person")
 */
class Person {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=80, unique=true, nullable=false)
     */
    protected $name;

    /**
     * @Column(type="string", length=255, unique=true, nullable=false)
     */
    protected $email;
    
    /**
     * @Column(type="integer", nullable=false)
     */
    protected $age;

    /**
     * @OneToMany(targetEntity = "Book", mappedBy = "primaryAuthor")
     */
    protected $booksAuthored;

    /**
     * @ManyToMany(targetEntity="Book",
     *            mappedBy="coauthors")
     * @var Book[]
     */
    protected $booksCoAuthored = null;

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
    
        public function getAge() {
        return $this->age;
    }
    
    public function setAge($age) {
        $this->age=$age;
        return $this;
    }
    
    public function getBooksAuthored(){
        return $this->booksAuthored;
    }
    
    public function getBooksCoauthored() {
        return $this->booksCoAuthored;
    }

    public function authoredBook($book) {
        $this->booksAuthored[] = $book;
    }
    
    public function coauthoredBook($book) {
        $this->booksCoAuthored[] = $book;
    }

}
