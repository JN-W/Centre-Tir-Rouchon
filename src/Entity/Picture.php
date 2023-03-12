<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;



#[ORM\Entity(repositoryClass: PictureRepository::class)]
class Picture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pic_filename = null;

    #[ORM\Column(length: 255)]
    private ?string $pic_asset = null;

    #[ORM\ManyToOne(inversedBy: 'pictures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?News $news = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicFilename(): ?string
    {
        return $this->pic_filename;
    }

    public function setPicFilename(string $pic_filename): self
    {
        $this->pic_filename = $pic_filename;

        return $this;
    }

    public function getPicAsset(): ?string
    {
        return $this->pic_asset;
    }

    public function setPicAsset(string $pic_asset): self
    {
        $this->pic_asset = $pic_asset;

        return $this;
    }

    public function getNews(): ?News
    {
        return $this->news;
    }

    public function setNews(?News $news): self
    {
        $this->news = $news;

        return $this;
    }

}
