<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DatePriceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DatePriceRepository::class)]
#[ApiResource]
class DatePrice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $end_date = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\OneToMany(mappedBy: 'date_price', targetEntity: Power::class)]
    private Collection $powers;

    public function __construct()
    {
        $this->powers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): static
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): static
    {
        $this->end_date = $end_date;

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
            $power->setDatePrice($this);
        }

        return $this;
    }

    public function removePower(Power $power): static
    {
        if ($this->powers->removeElement($power)) {
            // set the owning side to null (unless already changed)
            if ($power->getDatePrice() === $this) {
                $power->setDatePrice(null);
            }
        }

        return $this;
    }
}
