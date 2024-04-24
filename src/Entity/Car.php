<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?float $rental_price = null;

    #[ORM\Column(length: 255)]
    private ?string $pictures = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column(nullable: true)]
    private ?int $year = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type_of_gearbox = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fuel_type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $place_of_delivery = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $place_of_reteur = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $posted_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getRentalPrice(): ?float
    {
        return $this->rental_price;
    }

    public function setRentalPrice(float $rental_price): static
    {
        $this->rental_price = $rental_price;

        return $this;
    }

    public function getPictures(): ?string
    {
        return $this->pictures;
    }

    public function setPictures(string $pictures): static
    {
        $this->pictures = $pictures;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getTypeOfGearbox(): ?string
    {
        return $this->type_of_gearbox;
    }

    public function setTypeOfGearbox(?string $type_of_gearbox): static
    {
        $this->type_of_gearbox = $type_of_gearbox;

        return $this;
    }

    public function getFuelType(): ?string
    {
        return $this->fuel_type;
    }

    public function setFuelType(?string $fuel_type): static
    {
        $this->fuel_type = $fuel_type;

        return $this;
    }

    public function getPlaceOfDelivery(): ?string
    {
        return $this->place_of_delivery;
    }

    public function setPlaceOfDelivery(?string $place_of_delivery): static
    {
        $this->place_of_delivery = $place_of_delivery;

        return $this;
    }

    public function getPlaceOfReteur(): ?string
    {
        return $this->place_of_reteur;
    }

    public function setPlaceOfReteur(?string $place_of_reteur): static
    {
        $this->place_of_reteur = $place_of_reteur;

        return $this;
    }

    public function getPostedAt(): ?\DateTimeImmutable
    {
        return $this->posted_at;
    }

    public function setPostedAt(?\DateTimeImmutable $posted_at): static
    {
        $this->posted_at = $posted_at;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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
