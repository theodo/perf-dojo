<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 */
class Skill
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
    private $skillName;

    /**
     * @ORM\OneToMany(targetEntity="Freelance", mappedBy="skill")
     */
    private $freelance;

    public function __construct()
    {
        $this->freelances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkillName(): ?string
    {
        return $this->skillName;
    }

    public function setSkillName(string $skillName): self
    {
        $this->skillName = $skillName;

        return $this;
    }

    /**
     * @returns ?ArrayCollection|?array
     */
    public function getFreelances()
    {
        return $this->freelance;
    }

    public function setFreelances(ArrayCollection $freelances): self
    {
        $this->freelances = $freelances;

        return $this;
    }
}
