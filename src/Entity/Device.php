<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DeviceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeviceRepository::class)]
#[ApiResource]
class Device
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'devices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $owner = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?DeviceType $type = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\OneToMany(mappedBy: 'device', targetEntity: Power::class, orphanRemoval: true)]
    private Collection $powers;

    public function __construct()
    {
        $this->powers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    public function getType(): ?DeviceType
    {
        return $this->type;
    }

    public function setType(?DeviceType $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection<int, Power>
     */
    public function getPowers(): Collection
    {
        return $this->powers;
    }

    public function addPower(Power $power): static
    {
        if (!$this->powers->contains($power)) {
            $this->powers->add($power);
            $power->setDevice($this);
        }

        return $this;
    }

    public function removePower(Power $power): static
    {
        if ($this->powers->removeElement($power)) {
            // set the owning side to null (unless already changed)
            if ($power->getDevice() === $this) {
                $power->setDevice(null);
            }
        }

        return $this;
    }
}
