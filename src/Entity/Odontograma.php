<?php

namespace App\Entity;

use App\Repository\OdontogramaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OdontogramaRepository::class)]
#[ORM\Table(name: 'odontograma')]
class Odontograma
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?HistoriaClinica $historia = null;

    #[ORM\ManyToOne]
    private ?Cita $cita = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Odontologo $odontologo = null;

    #[ORM\Column]
    private ?\DateTime $fecha = null;

    #[ORM\Column(length: 20)]
    private ?string $tipo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observacion = null;

    public function __construct()
    {
         $this->fecha = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHistoria(): ?HistoriaClinica
    {
        return $this->historia;
    }

    public function setHistoria(?HistoriaClinica $historia): static
    {
        $this->historia = $historia;

        return $this;
    }

    public function getCita(): ?Cita
    {
        return $this->cita;
    }

    public function setCita(?Cita $cita): static
    {
        $this->cita = $cita;

        return $this;
    }

    public function getOdontologo(): ?Odontologo
    {
        return $this->odontologo;
    }

    public function setOdontologo(?Odontologo $odontologo): static
    {
        $this->odontologo = $odontologo;

        return $this;
    }

    public function getFecha(): ?\DateTime
    {
        return $this->fecha;
    }

    public function setFecha(\DateTime $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getObservacion(): ?string
    {
        return $this->observacion;
    }

    public function setObservacion(?string $observacion): static
    {
        $this->observacion = $observacion;

        return $this;
    }
}
