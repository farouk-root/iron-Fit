<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Content = null;

    #[ORM\Column(nullable: true)]
    private ?int $Likes = null;

    #[ORM\Column(nullable: true)]
    private ?bool $IsFlagged = null;

    #[ORM\Column]
    private ?bool $IsApproved = null;

    #[ORM\Column(nullable: true)]
    private ?bool $IsDeleted = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Created_At = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLikes(): ?int
    {
        return $this->Likes;
    }

    public function setLikes(?int $Likes): static
    {
        $this->Likes = $Likes;

        return $this;
    }

    public function isIsFlagged(): ?bool
    {
        return $this->IsFlagged;
    }

    public function setIsFlagged(?bool $IsFlagged): static
    {
        $this->IsFlagged = $IsFlagged;

        return $this;
    }

    public function isIsApproved(): ?bool
    {
        return $this->IsApproved;
    }

    public function setIsApproved(bool $IsApproved): static
    {
        $this->IsApproved = $IsApproved;

        return $this;
    }

    public function isIsDeleted(): ?bool
    {
        return $this->IsDeleted;
    }

    public function setIsDeleted(?bool $IsDeleted): static
    {
        $this->IsDeleted = $IsDeleted;

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
}
