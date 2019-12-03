<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientsRepository")
 */
class Clients
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
    private $NomClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PrenomClient;

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

    

    /**
     * @ORM\Column(type="text")
     */
    private $LieuxLivraison;

    public function __construct()
    {
        $this->ventes = new ArrayCollection();
        $this->DateAjout = new  \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNomClient(): ?string
    {
        return $this->NomClient;
    }

    public function setNomClient(?string $NomClient): self
    {
        $this->NomClient = $NomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->PrenomClient;
    }

    public function setPrenomClient(?string $PrenomClient): self
    {
        $this->PrenomClient = $PrenomClient;

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

    

    public function getLieuxLivraison(): ?string
    {
        return $this->LieuxLivraison;
    }

    public function setLieuxLivraison(string $LieuxLivraison): self
    {
        $this->LieuxLivraison = $LieuxLivraison;

        return $this;
    }
}
