<?php

namespace Entity;

/**
 * User Model
 *
 * @Entity
 * @Table(name="clanak")
 */
class Clanak {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=45, unique=false, nullable=true)
     */
    protected $naslov;

    /**
     * @Column(type="text", unique=false, nullable=true)
     */
    protected $sadrzaj;

    /**
     * @Column(type="date", unique=false, nullable=true)
     */
    protected $datum;

    /**
     * @Column(type="time", unique=false, nullable=true)
     */
    protected $vreme;

    /**
     * @Column(type = "integer", unique = false, nullable = true)
     */
    protected $brpregleda;

    /**
     * @ManyToOne(targetEntity = "Korisnik", inversedBy = "clanci")
     */
    protected $autor;

    /**
     * @ManyToOne(targetEntity = "Oblast", inversedBy = "clanci", cascade={"remove"})
     */
    protected $oblast;
    
    /**
     * @OneToMany(targetEntity = "Fajl", mappedBy = "clanak")
     */
    protected $fajlovi;
    
    /**
     * @OneToMany(targetEntity = "Ocena", mappedBy = "clanak", cascade={"remove"})
     */
    protected $ocene;
    
    /**
     * @OneToMany(targetEntity = "Izmena", mappedBy = "clanak", cascade={"remove"})
     */
    protected $izmene;

    public function getId() {
        return $this->id;
    }

    public function getNaslov() {
        return $this->naslov;
    }

    public function getSadrzaj() {
        return $this->sadrzaj;
    }

    public function getDatum() {
        return $this->datum;
    }

    public function getTime() {
        return $this->time;
    }

    public function getBrpregleda() {
        return $this->brpregleda;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getOblast() {
        return $this->oblast;
    }
    
    public function getIzmene() {
        return $this->izmene;
    }
    
    public function getOcena () {
        $suma = 0;
        $i = 0;
        foreach ($this->ocene as $ocena) {
            $i += 1;
            $suma += $ocena->getOcena();
        }
        if ($i != 0)  {
            return $suma / $i; 
            
        }
        else { 
            return 0; 
            
        }
    }

    public function setNaslov($naslov) {
        $this->naslov = $naslov;
    }

    public function setSadrzaj($sadrzaj) {
        $this->sadrzaj = $sadrzaj;
    }

    public function setDatum($datum) {
        $this->datum = $datum;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    public function setBrpregleda($brpregleda) {
        $this->brpregleda = $brpregleda;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setOblast($oblast) {
        $this->oblast = $oblast;
    }
    
    public function oceni ($em, $ocena, $korisnik) {
        $ocena_obj = $em->getRepository('Entity\Ocena')->
                findOneBy(array('korisnik' => $korisnik, 'clanak' => $this));
        if ($ocena_obj != NULL) {
            $ocena_obj->setOcena($ocena);
        }
        else {
            $ocena_obj = new Ocena();
            $ocena_obj->setKorisnik($korisnik);
            $ocena_obj->setOcena($ocena);
            $ocena_obj->setClanak($this);    
        }
        $em->persist($ocena_obj); 
        $em->flush();
        return TRUE;
    }

}
