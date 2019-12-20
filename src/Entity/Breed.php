<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BreedRepository")
 */
class Breed
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
    private $breedName;

    /**
     * @ORM\OneToMany(targetEntity="CatPicture", mappedBy="breed")
     */
    private $catPictures;

    public function __construct()
    {
        $this->catPictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBreedName(): ?string
    {
        return $this->breedName;
    }

    public function setBreedName(string $breedName): self
    {
        $this->breedName = $breedName;

        return $this;
    }

    /**
     * @returns ?ArrayCollection|?array
     */
    public function getCatPictures()
    {
        return $this->catPictures;
    }

    public function setCatPictures(ArrayCollection $catPictures): self
    {
        $this->catPictures = $catPictures;

        return $this;
    }
}
