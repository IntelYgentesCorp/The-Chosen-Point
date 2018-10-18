<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JourneyRepository")
 */
class Journey
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $seats;

    /**
     * @ORM\Column(type="datetime")
     */
    private $departureAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="journeys")
     * @ORM\JoinColumn(nullable=false)
     */
    private $driver;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DepartureZone")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departureZone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ArrivalZone")
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrivalZone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Request", mappedBy="journey", orphanRemoval=true)
     */
    private $requests;

    /**
     * @ORM\Version()
     * @ORM\Column(type="integer")
     */
    private $version;

    public function __construct()
    {
        $this->requests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): self
    {
        $this->seats = $seats;

        return $this;
    }

    public function getDepartureAt(): ?\DateTimeInterface
    {
        return $this->departureAt;
    }

    public function setDepartureAt(\DateTimeInterface $departureAt): self
    {
        $this->departureAt = $departureAt;

        return $this;
    }

    public function getDriver(): ?User
    {
        return $this->driver;
    }

    public function setDriver(?User $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getDepartureZone(): ?DepartureZone
    {
        return $this->departureZone;
    }

    public function setDepartureZone(?DepartureZone $departureZone): self
    {
        $this->departureZone = $departureZone;

        return $this;
    }

    public function getArrivalZone(): ?ArrivalZone
    {
        return $this->arrivalZone;
    }

    public function setArrivalZone(?ArrivalZone $arrivalZone): self
    {
        $this->arrivalZone = $arrivalZone;

        return $this;
    }

    /**
     * @return Collection|Request[]
     */
    public function getRequests(): Collection
    {
        return $this->requests;
    }

    public function addRequest(Request $request): self
    {
        if (!$this->requests->contains($request)) {
            $this->requests[] = $request;
            $request->setJourney($this);
        }

        return $this;
    }

    public function removeRequest(Request $request): self
    {
        if ($this->requests->contains($request)) {
            $this->requests->removeElement($request);
            // set the owning side to null (unless already changed)
            if ($request->getJourney() === $this) {
                $request->setJourney(null);
            }
        }

        return $this;
    }
}
