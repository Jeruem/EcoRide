<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    private ?Ride $ride = null;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    private ?User $passengers = null;

    #[ORM\Column(length: 255)]

    #[Assert\Choice(choices: ['pending', 'confirmed', 'cancelled'], message: 'Invalid status')]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRide(): ?Ride
    {
        return $this->ride;
    }

    public function setRide(?Ride $ride): static
    {
        $this->ride = $ride;

        return $this;
    }

    public function getPassengers(): ?User
    {
        return $this->passengers;
    }

    public function setPassengers(?User $passengers): static
    {
        $this->passengers = $passengers;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
