<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PublicationRepository::class)]
class Publication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Title = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Created_At = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Updated_At = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Status = null;

    #[ORM\ManyToMany(targetEntity: CategoriePublication::class, mappedBy: 'Publication')]
    private Collection $categoriePublications;

    #[ORM\ManyToOne(inversedBy: 'publications')]
    private ?User $user = null;

    public function __construct()
    {
        $this->categoriePublications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(?string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->Created_At;
    }

    public function setCreatedAt(\DateTimeImmutable $Created_At): static
    {
        $this->Created_At = $Created_At;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->Updated_At;
    }

    public function setUpdatedAt(\DateTimeImmutable $Updated_At): static
    {
        $this->Updated_At = $Updated_At;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(?string $Content): static
    {
        $this->Content = $Content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): static
    {
        $this->Image = $Image;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(?string $Status): static
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * @return Collection<int, CategoriePublication>
     */
    public function getCategoriePublications(): Collection
    {
        return $this->categoriePublications;
    }

    public function addCategoriePublication(CategoriePublication $categoriePublication): static
    {
        if (!$this->categoriePublications->contains($categoriePublication)) {
            $this->categoriePublications->add($categoriePublication);
            $categoriePublication->addPublication($this);
        }

        return $this;
    }

    public function removeCategoriePublication(CategoriePublication $categoriePublication): static
    {
        if ($this->categoriePublications->removeElement($categoriePublication)) {
            $categoriePublication->removePublication($this);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
