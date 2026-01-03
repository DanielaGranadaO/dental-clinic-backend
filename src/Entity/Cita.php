<?php

namespace App\Entity;

use App\Repository\CitaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CitaRepository::class)]
#[ORM\Table(name: 'cita')]
class Cita
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuario $usuario = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Odontologo $odontologo = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $fecha = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $horaInicio = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $horaFin = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observacion = null;

    #[ORM\Column(length: 20)]
    private ?string $estado = null;

    #[ORM\Column]
    private ?\DateTime $creado = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $actualizado = null;

    public function __construct()
    {
        $this->creado = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): static
    {
        $this->usuario = $usuario;

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

    public function getHoraInicio(): ?\DateTime
    {
        return $this->horaInicio;
    }

    public function setHoraInicio(\DateTime $horaInicio): static
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    public function getHoraFin(): ?\DateTime
    {
        return $this->horaFin;
    }

    public function setHoraFin(\DateTime $horaFin): static
    {
        $this->horaFin = $horaFin;

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

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    public function getCreado(): ?\DateTime
    {
        return $this->creado;
    }

    public function setCreado(\DateTime $creado): static
    {
        $this->creado = $creado;

        return $this;
    }

    public function getActualizado(): ?\DateTime
    {
        return $this->actualizado;
    }

    public function setActualizado(?\DateTime $actualizado): static
    {
        $this->actualizado = $actualizado;

        return $this;
    }
}
