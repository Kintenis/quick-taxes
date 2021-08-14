<?php

namespace App\Entity;

use App\Repository\TaxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaxRepository::class)
 */
class Tax
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="integer")
     */
    private $month;

    /**
     * @ORM\Column(type="float")
     */
    private $hotWc;

    /**
     * @ORM\Column(type="float")
     */
    private $hotKitchen;

    /**
     * @ORM\Column(type="float")
     */
    private $coldWc;

    /**
     * @ORM\Column(type="float")
     */
    private $coldKitchen;

    /**
     * @ORM\Column(type="integer")
     */
    private $electric;

    /**
     * @ORM\Column(type="float")
     */
    private $tax;

    /**
     * @ORM\Column(type="float")
     */
    private $fund;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getMonth(): ?int
    {
        return $this->month;
    }

    public function setMonth(int $month): self
    {
        $this->month = $month;

        return $this;
    }

    public function getHotWc(): ?float
    {
        return $this->hotWc;
    }

    public function setHotWc(float $hotWc): self
    {
        $this->hotWc = $hotWc;

        return $this;
    }

    public function getHotKitchen(): ?float
    {
        return $this->hotKitchen;
    }

    public function setHotKitchen(float $hotKitchen): self
    {
        $this->hotKitchen = $hotKitchen;

        return $this;
    }

    public function getColdWc(): ?float
    {
        return $this->coldWc;
    }

    public function setColdWc(float $coldWc): self
    {
        $this->coldWc = $coldWc;

        return $this;
    }

    public function getColdKitchen(): ?float
    {
        return $this->coldKitchen;
    }

    public function setColdKitchen(float $coldKitchen): self
    {
        $this->coldKitchen = $coldKitchen;

        return $this;
    }

    public function getElectric(): ?int
    {
        return $this->electric;
    }

    public function setElectric(int $electric): self
    {
        $this->electric = $electric;

        return $this;
    }

    public function getTax(): ?float
    {
        return $this->tax;
    }

    public function setTax(float $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function getFund(): ?float
    {
        return $this->fund;
    }

    public function setFund(float $fund): self
    {
        $this->fund = $fund;

        return $this;
    }
}
