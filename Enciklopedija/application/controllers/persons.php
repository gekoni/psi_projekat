<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Doctrine\Common\Collections\Criteria;

class Persons extends CI_Controller {

    public function index() {
        $this->load->library('doctrine');
        $em = $this->doctrine->em;



        $data = array(
            array("Milutin Milankovic12", "milutin12@vasi1ona.com", true, 56),
            array("Mihajlo Pupin12", "mihajlo12@pas1njak.com", true, 67),
            array("Nikola Tesla12", "nikola12@nema1knjigu.com", false, 65)
        );

        $persons = array();

        foreach ($data as $person) {
            $user = new Entity\Person();
            $user->setName($person[0]);
            $user->setEmail($person[1]);
            $user->setAge($person[3]);
            echo ".";
            if ($person[2] && !$this->already_contained($user)) {
                $em->persist($user);
            }
            $persons [] = $person;
        }
        try {
            $em->flush();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            echo "Persons: \n\n" . print_r($persons);
        }


        $this->load->view('welcome_message', array("persons" => $this->doctrine->em->getRepository('Entity\Person')->findAll()));
    }

    private function already_contained($person) {
        $persons = $this->doctrine->em->getRepository('Entity\Person')->findBy(array('name' => $person->getName()));
        return $persons != null;
    }

    public function profile($id) {
        $this->load->library('doctrine');
        $em = $this->doctrine->em;
        $person = $em->find("Entity\Person", $id);
        $this->load->view('profile', array('person' => $person));
    }

    public function ageTestQueryBuilder() {
        $this->load->library('doctrine');
        $em = $this->doctrine->em;
        $qb = $em->createQueryBuilder();
        $qb->select('p')
                ->from('Entity\Person', 'p')
                ->where('p.age >= :ageMin and p.age <= :ageMax')
                ->orderBy('p.name', 'ASC')
                ->setParameter('ageMin', 50)
                ->setParameter('ageMax', 70);
        $q = $qb->getQuery();
        $result = $q->getResult();
        foreach ($result as $value) {
            echo $value->getName();
        }
    }

    public function ageTestCriteria() {
        $this->load->library('doctrine');
        $em = $this->doctrine->em;
        $criteria = Criteria::create()
                ->where(Criteria::expr()->gt("age", 50))
                ->andWhere(Criteria::expr()->lt("age", 70))
                ->orderBy(array("name" => Criteria::ASC))
                ->setFirstResult(0)
                ->setMaxResults(20)
        ;
        $result = $em->getRepository("Entity\Person")->matching($criteria);
        foreach ($result as $value) {
            echo $value->getName();
        }
    }

    public function ageTestDQL() {
        $this->load->library('doctrine');
        $em = $this->doctrine->em;
        $q = $em->createQuery("select p from Entity\Person p where p.age >= :ageMin and p.age <= :ageMax");
        $q->setParameter('ageMin', 50)
                ->setParameter('ageMax', 70);
        $result = $q->getResult();

        foreach ($result as $value) {
            echo $value->getName();
        }
    }

    public function addBook($primaryAuthorId, $bookName, $secondAuthorId) {
        $this->load->library('doctrine');
        $em = $this->doctrine->em;
        $primAuthor = $em->getRepository("Entity\Person")->find($primaryAuthorId);
        $secAuthor = $em->getRepository("Entity\Person")->find($secondAuthorId);
        echo $primAuthor->getName();
        $book = new Entity\Book();
        $book->setName($bookName);
        $book->setPrimaryAuthor($primAuthor);
        $book->addToCoauthor($secAuthor);
        $em->persist($book);
        echo $book->getName();

        echo "<br/>\nAuthored \n<br/>";
        foreach ($primAuthor->getBooksAuthored() as $bk) {
            echo $bk->getName() . "<br/>";
        }

        echo "<br/>COAUTHORED \n<br/>";
        foreach ($secAuthor->getBooksCoauthored() as $bk) {
            echo $bk->getName() . "<br/>";
        }
        $this->load->view('profile', array('person' => $primAuthor));
        $em->flush();
    }

    public function listBooks($primaryAuthorId) {
        $this->load->library('doctrine');
        $em = $this->doctrine->em;
        $q = $em->createQuery("select p from Entity\Person p where p.id=:id");
        $q->setParameter('id', $primaryAuthorId);
        $p = $q->getSingleResult();
        $this->load->view('profile', array('person' => $p));
    }

    public function listBooksEager($primaryAuthorId) {
        $this->load->library('doctrine');
        $em = $this->doctrine->em;

        $q = $em->createQuery("select p from Entity\Person p where p.id=:id");

        $q->setParameter('id', $primaryAuthorId);
        $q->setFetchMode("Entity\Person", "booksAuthored", "EAGER");

        $p = $q->getSingleResult();

        $this->load->view('profile', array('person' => $p));
    }
    
    public function listAuthorsWithBooksWritten(){
        $this->load->library('doctrine');
        $em = $this->doctrine->em;
        $q = $em->createQuery('SELECT p FROM Entity\Person p JOIN p.booksAuthored');
        $result = $q->getResult();
        foreach ($result as $author){
            echo $author->getName();
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
