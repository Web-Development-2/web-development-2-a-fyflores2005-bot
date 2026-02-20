<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ApiResource(
    operations : [
        new Get(),
        new GetCollection(),
        new Post(),
        new Put(),
        new Delete()
    ],

    normalizationContext: ['groups' => ['task:read']],
    denormalizationContext: ['groups' => ['task:write']]
)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    #[Groups(['task:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['task:read', 'task:write'])]
    private ?string $title = null;

    #[ORM\Column(length: 150)]
    #[Groups(['task:read', 'task:write'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(['task:read', 'task:write'])]
    private ?\DateTime $startDate = null;

    #[ORM\Column]
    #[Groups(['task:read', 'task:write'])]
    private ?\DateTime $endDate = null;

    #[ORM\Column]
    #[Groups(['task:read', 'task:write'])]
    private ?float $price = null;

    #[ORM\Column]
    #[Groups(['task:read', 'task:write'])]
    private ?int $masAttendees = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTime $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTime $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getMasAttendees(): ?int
    {
        return $this->masAttendees;
    }

    public function setMasAttendees(int $masAttendees): static
    {
        $this->masAttendees = $masAttendees;

        return $this;
    }
}
