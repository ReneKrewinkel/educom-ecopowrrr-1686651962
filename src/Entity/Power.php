<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PowerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PowerRepository::class)]
#[ApiResource]
class Power
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'powers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Device $device = null;

    #[ORM\Column]
    private ?int $yield = null;

    #[ORM\Column]
    private ?int $consumed = null;

    #[ORM\ManyToOne(inversedBy: 'powers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DatePrice $date_price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDevice(): ?Device
    {
        return $this->device;
    }

    public function setDevice(?Device $device): static
    {
        $this->device = $device;

        return $this;
    }

    public function getYield(): ?int
    {
        return $this->yield;
    }

    public function setYield(int $yield): static
    {
        $this->yield = $yield;

        return $this;
    }

    public function getConsumed(): ?int
    {
        return $this->consumed;
    }

    public function setConsumed(int $consumed): static
    {
        $this->consumed = $consumed;

        return $this;
    }

    public function getDatePrice(): ?DatePrice
    {
        return $this->date_price;
    }

    public function setDatePrice(?DatePrice $date_price): static
    {
        $this->date_price = $date_price;

        return $this;
    }
}
