<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockRepository")
 */
class Stock
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=4, max=255, minMessage="Veuillez saisir au moins 4 caractères.")
     */
    private $Type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Quantite;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=4, max=255, minMessage="Veuillez saisir au moins 4 caractères.")
     */
    private $Emplacement;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url()
     */
    private $Image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=4, max=255, minMessage="Veuillez saisir au moins 4 caractères.")
     */
    private $Dimensions;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Grammage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2, max=255, minMessage="Veuillez saisir au moins 2 caractères.")
     */
    private $Description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $modifiedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="stocks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=255, minMessage="Veuillez saisir le code barre à l'aide de la douchette")
     */
    private $barcode;

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

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

    public function getEmplacement(): ?string
    {
        return $this->Emplacement;
    }

    public function setEmplacement(string $Emplacement): self
    {
        $this->Emplacement = $Emplacement;

        return $this;
    }

    public function getDimensions(): ?string
    {
        return $this->Dimensions;
    }

    public function setDimensions(?string $Dimensions): self
    {
        $this->Dimensions = $Dimensions;

        return $this;
    }

    public function getGrammage(): ?int
    {
        return $this->Grammage;
    }

    public function setGrammage(?int $Grammage): self
    {
        $this->Grammage = $Grammage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeInterface
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(\DateTimeInterface $modifiedAt): self
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
    
    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(?string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }
}
