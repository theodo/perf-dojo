<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FreelanceRepository")
 */
class Freelance
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pictureSmall;

    /**
     * @ORM\ManyToOne(targetEntity="Skill")
     * @ORM\JoinColumn(name="skill_id", referencedColumnName="id")
     */
    private $skill;

    /**
     * @ORM\Column(type="integer")
     */
    private $yearsOfExperience;

    /**
     * @ORM\Column(type="integer")
     */
    private $hourlyRate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getPictureSmall(): ?string
    {
        return $this->pictureSmall;
    }

    public function setPictureSmall(string $pictureSmall): self
    {
        $this->pictureSmall = $pictureSmall;

        return $this;
    }

    public function getSkill(): ?Skill
    {
        return $this->skill;
    }

    public function setSkill(Skill $skill): self
    {
        $this->skill = $skill;

        return $this;
    }

    public function getYearsOfExperience(): ?int
    {
        return $this->yearsOfExperience;
    }

    public function setYearsOfExperience(int $yearsOfExperience): self
    {
        $this->yearsOfExperience = $yearsOfExperience;

        return $this;
    }

    public function getHourlyRate(): ?int
    {
        return $this->hourlyRate;
    }

    public function setHourlyRate(int $hourlyRate): self
    {
        $this->hourlyRate = $hourlyRate;

        return $this;
    }
}
