<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;



#[ORM\Entity(repositoryClass: NewsRepository::class)]
#[Vich\Uploadable]
class News
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 3000)]
    private ?string $content = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 10)]
    private ?string $category = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $creationDate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $recap = null;

    // ESSAI POUR UPLOAD IMAGE


    #[ORM\Column(length: 255)]
    private ?string $Pic1Filename  ;

    public function getPic1Filename()
    {
        return $this->Pic1Filename;
    }

    public function setPic1Filename($Pic1Filename)
    {
        $this->Pic1Filename = $Pic1Filename;

        return $this;
    }

    #[ORM\Column(length: 255)]
    private ?string $Pic1Asset  ;

    public function getPic1Asset()
    {
        return $this->Pic1Asset;
    }

    public function setPic1Asset($Pic1Asset)
    {
        $this->Pic1Asset = $Pic1Asset;

        return $this;
    }



    // FIN ESSAI UPLOAD







    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(?\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getRecap(): ?string
    {
        return $this->recap;
    }

    public function setRecap(string $recap): self
    {
        $this->recap = $recap;

        return $this;
    }
}
