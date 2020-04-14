<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquippementRepository")
 */
class Equippement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=190)
     */
    private $description;


    private $categoryid;
    /**
     * @ORM\JoinColumn(name="category_id", nullable=true)
     * @ORM\OneToOne(targetEntity=Category::class)
     */
    private $category;

    /**
     * @ORM\Column(type="date")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $serialnumber;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getcategoryId(): ?int
    {
        return $this->categoryid;
    }

    public function setCategoryId($categoryidvalue): ?int
    {
        $this->categoryid = $categoryidvalue;

        return $this;
    }


    public function getcategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public $toAdd;

 /*
    public function isToAdd():?bool
    {
        return $this->toAdd;
    }


    public function setToAdd(?bool $toAddn): self
    {
        $this->toAdd = toAddn;

        return $this;
    }

*/
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getSerialnumber(): ?string
    {
        return $this->serialnumber;
    }

    public function setSerialnumber(string $serialnumber): self
    {
        $this->serialnumber = $serialnumber;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
