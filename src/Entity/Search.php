<?php

namespace App\Entity;

class Search{
    /**
    * @var string
    */
    public $nom;

    public function getNom(): ?string
    {
        return $this->nom;
    }
    public function setNom(string $nom): Search
    {
        $this->nom = $nom;
        return $this;
    }
}