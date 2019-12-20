<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CatPictureRepository")
 */
class CatPicture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $catName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $catPicture;

    /**
     * @ORM\ManyToOne(targetEntity="Breed")
     * @ORM\JoinColumn(name="breed_id", referencedColumnName="id")
     */
    private $breed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatName(): ?string
    {
        return $this->catName;
    }

    public function setCatName(string $catName): self
    {
        $this->catName = $catName;

        return $this;
    }

    public function getCatPicture(): ?string
    {
        return $this->catPicture;
    }

    public function setCatPicture(string $catPicture): self
    {
        $this->catPicture = $catPicture;

        return $this;
    }

    public function getBreed(): ?Breed
    {
        return $this->breed;
    }

    public function setBreed(Breed $breed): self
    {
        $this->breed = $breed;

        return $this;
    }
}
