<?php

namespace App\Entity;

use App\Repository\CategoriePublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriePublicationRepository::class)]
class CategoriePublication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Publication::class, inversedBy: 'categoriePublications')]
    private Collection $Publication;

    public function __construct()
    {
        $this->Publication = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Publication>
     */
    public function getPublication(): Collection
    {
        return $this->Publication;
    }

    public function addPublication(Publication $publication): static
    {
        if (!$this->Publication->contains($publication)) {
            $this->Publication->add($publication);
        }

        return $this;
    }

    public function removePublication(Publication $publication): static
    {
        $this->Publication->removeElement($publication);

        return $this;
    }
}
