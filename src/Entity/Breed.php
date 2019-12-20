<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}
