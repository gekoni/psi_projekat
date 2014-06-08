<?php

namespace DoctrineProxies\__CG__\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Clanak extends \Entity\Clanak implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function getNaslov()
    {
        $this->__load();
        return parent::getNaslov();
    }

    public function getSadrzaj()
    {
        $this->__load();
        return parent::getSadrzaj();
    }

    public function getDatum()
    {
        $this->__load();
        return parent::getDatum();
    }

    public function getTime()
    {
        $this->__load();
        return parent::getTime();
    }

    public function getBrpregleda()
    {
        $this->__load();
        return parent::getBrpregleda();
    }

    public function getAutor()
    {
        $this->__load();
        return parent::getAutor();
    }

    public function getOblast()
    {
        $this->__load();
        return parent::getOblast();
    }

    public function getIzmene()
    {
        $this->__load();
        return parent::getIzmene();
    }

    public function getOcena()
    {
        $this->__load();
        return parent::getOcena();
    }

    public function setNaslov($naslov)
    {
        $this->__load();
        return parent::setNaslov($naslov);
    }

    public function setSadrzaj($sadrzaj)
    {
        $this->__load();
        return parent::setSadrzaj($sadrzaj);
    }

    public function setDatum($datum)
    {
        $this->__load();
        return parent::setDatum($datum);
    }

    public function setTime($time)
    {
        $this->__load();
        return parent::setTime($time);
    }

    public function setBrpregleda($brpregleda)
    {
        $this->__load();
        return parent::setBrpregleda($brpregleda);
    }

    public function setAutor($autor)
    {
        $this->__load();
        return parent::setAutor($autor);
    }

    public function setOblast($oblast)
    {
        $this->__load();
        return parent::setOblast($oblast);
    }

    public function oceni($em, $ocena, $korisnik)
    {
        $this->__load();
        return parent::oceni($em, $ocena, $korisnik);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'naslov', 'sadrzaj', 'datum', 'vreme', 'brpregleda', 'autor', 'oblast', 'fajlovi', 'ocene', 'izmene');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}