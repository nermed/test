<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $prenom;

    /**
     * @ORM\OneToOne(targetEntity=Faculte::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $faculte;

    /**
     * @ORM\Column(type="integer")
     */
    private $math;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $physique;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $geo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $histoire;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $francais;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gestion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;
    /**
     * @var File|null
     * @Assert\File(maxSize="5242880", mimeTypes={
     *  "image/png", 
     *  "image/jpeg", 
     *  "image/webp", 
     *  "application/pdf"})
     */
    private $imageFile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getFaculte(): ?Faculte
    {
        return $this->faculte;
    }

    public function setFaculte(Faculte $faculte): self
    {
        $this->faculte = $faculte;

        return $this;
    }

    public function getMath(): ?int
    {
        return $this->math;
    }

    public function setMath(int $math): self
    {
        $this->math = $math;

        return $this;
    }

    public function getPhysique(): ?int
    {
        return $this->physique;
    }

    public function setPhysique(?int $physique): self
    {
        $this->physique = $physique;

        return $this;
    }

    public function getGeo(): ?int
    {
        return $this->geo;
    }

    public function setGeo(?int $geo): self
    {
        $this->geo = $geo;

        return $this;
    }

    public function getHistoire(): ?int
    {
        return $this->histoire;
    }

    public function setHistoire(?int $histoire): self
    {
        $this->histoire = $histoire;

        return $this;
    }

    public function getFrancais(): ?int
    {
        return $this->francais;
    }

    public function setFrancais(?int $francais): self
    {
        $this->francais = $francais;

        return $this;
    }

    public function getGestion(): ?int
    {
        return $this->gestion;
    }

    public function setGestion(?int $gestion): self
    {
        $this->gestion = $gestion;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param ?File|null $imageFile
     * 
     * @return self
     */
    public function setImageFile(?File $imageFile): self
    {
        $this->imageFile = $imageFile;
        return $this;
    }
}
