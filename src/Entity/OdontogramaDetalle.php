<?php

namespace App\Entity;

use App\Repository\OdontogramaDetalleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OdontogramaDetalleRepository::class)]
#[ORM\Table(name: 'odontograma_detalle')]
class OdontogramaDetalle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Odontograma $odontograma = null;

    #[ORM\Column]
    private ?int $numeroDiente = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $superficie = null;

    #[ORM\Column(length: 100)]
    private ?string $diagnostico = null;

    #[ORM\Column(length: 7)]
    private ?string $color = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observaciones = null;

    public function __construct()
    {
        $this->color = '#FFFFFF';  // Blanco por defecto
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOdontograma(): ?Odontograma
    {
        return $this->odontograma;
    }

    public function setOdontograma(?Odontograma $odontograma): static
    {
        $this->odontograma = $odontograma;

        return $this;
    }

    public function getNumeroDiente(): ?int
    {
        return $this->numeroDiente;
    }

    public function setNumeroDiente(int $numeroDiente): static
    {
        $this->numeroDiente = $numeroDiente;

        return $this;
    }

    public function getSuperficie(): ?string
    {
        return $this->superficie;
    }

    public function setSuperficie(?string $superficie): static
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getDiagnostico(): ?string
    {
        return $this->diagnostico;
    }

    public function setDiagnostico(string $diagnostico): static
    {
        $this->diagnostico = $diagnostico;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): static
    {
        $this->observaciones = $observaciones;

        return $this;
    }
}
