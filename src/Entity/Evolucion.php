<?php

namespace App\Entity;

use App\Repository\EvolucionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvolucionRepository::class)]
#[ORM\Table(name: 'evolucion')]
class Evolucion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?HistoriaClinica $historiaClinica = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cita $cita = null;

    #[ORM\ManyToOne]
    private ?Odontologo $odontologo = null;

    #[ORM\Column]
    private ?\DateTime $fecha = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $motivoConsulta = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $sintomas = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $hallazgosExamen = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $diagnostico = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $tratamientoRealizado = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $medicamentosRecetados = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $indicaciones = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $proximoControl = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observaciones = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $firmaPaciente = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $fechaFirmaPaciente = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $firmaOdontologo = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $fechaFirmaOdontologo = null;

    #[ORM\Column]
    private ?\DateTime $creado = null;


    public function __construct()
    {
         $this->creado= new \DateTime();
         $this->fecha = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHistoriaClinica(): ?HistoriaClinica
    {
        return $this->historiaClinica;
    }

    public function setHistoriaClinica(?HistoriaClinica $historiaClinica): static
    {
        $this->historiaClinica = $historiaClinica;

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

    public function getMotivoConsulta(): ?string
    {
        return $this->motivoConsulta;
    }

    public function setMotivoConsulta(?string $motivoConsulta): static
    {
        $this->motivoConsulta = $motivoConsulta;

        return $this;
    }

    public function getSintomas(): ?string
    {
        return $this->sintomas;
    }

    public function setSintomas(?string $sintomas): static
    {
        $this->sintomas = $sintomas;

        return $this;
    }

    public function getHallazgosExamen(): ?string
    {
        return $this->hallazgosExamen;
    }

    public function setHallazgosExamen(?string $hallazgosExamen): static
    {
        $this->hallazgosExamen = $hallazgosExamen;

        return $this;
    }

    public function getDiagnostico(): ?string
    {
        return $this->diagnostico;
    }

    public function setDiagnostico(?string $diagnostico): static
    {
        $this->diagnostico = $diagnostico;

        return $this;
    }

    public function getTratamientoRealizado(): ?string
    {
        return $this->tratamientoRealizado;
    }

    public function setTratamientoRealizado(?string $tratamientoRealizado): static
    {
        $this->tratamientoRealizado = $tratamientoRealizado;

        return $this;
    }

    public function getmedicamentosRecetados(): ?string
    {
        return $this->medicamentosRecetados;
    }

    public function setmedicamentosRecetados(?string $medicamentosRecetados): static
    {
        $this->medicamentosRecetados = $medicamentosRecetados;

        return $this;
    }

    public function getIndicaciones(): ?string
    {
        return $this->indicaciones;
    }

    public function setIndicaciones(?string $indicaciones): static
    {
        $this->indicaciones = $indicaciones;

        return $this;
    }

    public function getProximoControl(): ?\DateTime
    {
        return $this->proximoControl;
    }

    public function setProximoControl(?\DateTime $proximoControl): static
    {
        $this->proximoControl = $proximoControl;

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

    public function getFirmaPaciente(): ?string
    {
        return $this->firmaPaciente;
    }

    public function setFirmaPaciente(?string $firmaPaciente): static
    {
        $this->firmaPaciente = $firmaPaciente;

        return $this;
    }

    public function getFechaFirmaPaciente(): ?\DateTime
    {
        return $this->fechaFirmaPaciente;
    }

    public function setFechaFirmaPaciente(?\DateTime $fechaFirmaPaciente): static
    {
        $this->fechaFirmaPaciente = $fechaFirmaPaciente;

        return $this;
    }

    public function getFirmaOdontologo(): ?string
    {
        return $this->firmaOdontologo;
    }

    public function setFirmaOdontologo(?string $firmaOdontologo): static
    {
        $this->firmaOdontologo = $firmaOdontologo;

        return $this;
    }

    public function getFechaFirmaOdontologo(): ?\DateTime
    {
        return $this->fechaFirmaOdontologo;
    }

    public function setFechaFirmaOdontologo(?\DateTime $fechaFirmaOdontologo): static
    {
        $this->fechaFirmaOdontologo = $fechaFirmaOdontologo;

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
}
