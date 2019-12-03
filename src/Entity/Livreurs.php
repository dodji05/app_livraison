<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LivreursRepository")
 */
class Livreurs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NomLivreur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PrenomLivreur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Telephone1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Telephone2;

   

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $Sexe;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateAjout;   

    

    public function __construct()
    {
       
        $this->DateAjout = new  \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNomLivreur(): ?string
    {
        return $this->NomLivreur;
    }

    public function setNomLivreur(?string $NomLivreur): self
    {
        $this->NomLivreur = $NomLivreur;

        return $this;
    }

    public function getPrenomLivreur(): ?string
    {
        return $this->PrenomLivreur;
    }

    public function setPrenomLivreur(?string $PrenomLivreur): self
    {
        $this->PrenomLivreur = $PrenomLivreur;

        return $this;
    }

    public function getTelephone1(): ?string
    {
        return $this->Telephone1;
    }

    public function setTelephone1(string $Telephone1): self
    {
        $this->Telephone1 = $Telephone1;

        return $this;
    }

    public function getTelephone2(): ?string
    {
        return $this->Telephone2;
    }

    public function setTelephone2(?string $Telephone2): self
    {
        $this->Telephone2 = $Telephone2;

        return $this;
    }

   

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->DateAjout;
    }

    public function setDateAjout(\DateTimeInterface $DateAjout): self
    {
        $this->DateAjout = $DateAjout;

        return $this;
    }

    

}
