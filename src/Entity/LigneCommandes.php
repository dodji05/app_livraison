<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneCommandesRepository")
 */
class LigneCommandes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PrixVente;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Quantite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plats", inversedBy="ligneCommandes")
     */
    private $Plat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commandes", inversedBy="ligneCommandes")
     */
    private $Commande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixVente(): ?int
    {
        return $this->PrixVente;
    }

    public function setPrixVente(?int $PrixVente): self
    {
        $this->PrixVente = $PrixVente;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->Quantite;
    }

    public function setQuantite(?int $Quantite): self
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    public function getPlat(): ?Plats
    {
        return $this->Plat;
    }

    public function setPlat(?Plats $Plat): self
    {
        $this->Plat = $Plat;

        return $this;
    }

    public function getCommande(): ?Commandes
    {
        return $this->Commande;
    }

    public function setCommande(?Commandes $Commande): self
    {
        $this->Commande = $Commande;

        return $this;
    }
}
