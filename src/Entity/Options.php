<?php

namespace App\Entity;

use App\Repository\OptionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptionsRepository::class)]
class Options
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $option_name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $unit_price = null;

    #[ORM\ManyToOne(inversedBy: 'options')]
    private ?Billing $invoice_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOptionName(): ?string
    {
        return $this->option_name;
    }

    public function setOptionName(string $option_name): static
    {
        $this->option_name = $option_name;

        return $this;
    }

    public function getUnitPrice(): ?string
    {
        return $this->unit_price;
    }

    public function setUnitPrice(string $unit_price): static
    {
        $this->unit_price = $unit_price;

        return $this;
    }

    public function getBillingId(): ?Billing
    {
        return $this->invoice_id;
    }

    public function setBillingId(?Billing $invoice_id): static
    {
        $this->invoice_id = $invoice_id;

        return $this;
    }
}
