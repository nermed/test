<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class EtudiantSearch{

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }
    /**
     * @var int|null
     */
    private $nom;

    /**
     * @return int|null
     */
    public function getNom(): ?int
    {
		return $this->nom;
	}

    /**
     * @param int|null $nom
     * 
     * @return EtudiantSearch
     */
    public function setNom(int $nom): EtudiantSearch
    {
        $this->nom = $nom;
        return $this;
	}
    /**
     * @var int|null
     * @Assert\Range(min=10)
     */
    private $prenom;

    public function getPrenom(): ?int
    {
		return $this->prenom;
	}

    /**
     * @param int|null $prenom
     * 
     * @return EtudiantSearch
     */
    public function setPrenom(int $prenom): EtudiantSearch
    {
        $this->prenom = $prenom;
        return $this;
    }

}