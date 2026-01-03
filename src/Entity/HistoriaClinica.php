<?php

namespace App\Entity;

use App\Repository\HistoriaClinicaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoriaClinicaRepository::class)]
#[ORM\Table(name: 'historia_clinica')]
#[ORM\UniqueConstraint(name: 'unique_usuario', columns: ['usuario_id'])]
class HistoriaClinica
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

    #[ORM\Column]
    private ?\DateTime $fechaApertura = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $motivoConsultaInicial = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $antecedentesMedicos = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $alergias = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $medicamentosActuales = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $ultimaVisitaOdontologo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $motivoUltimaVisita = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $frecuenciaCepillado = null;

    #[ORM\Column]
    private ?bool $usaSedaDental = null;

    #[ORM\Column]
    private ?bool $fumador = null;

    #[ORM\Column(nullable: true)]
    private ?int $cigarrillosDia = null;

    #[ORM\Column]
    private ?bool $consumeAlcohol = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $frecuenciaAlcohol = null;

    #[ORM\Column]
    private ?bool $bruxismo = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $presionArterial = null;

    #[ORM\Column(nullable: true)]
    private ?int $frecuenciaCardiaca = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 2, nullable: true)]
    private ?string $temperatura = null;

    #[ORM\Column]
    private ?\DateTime $creado = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $actualizado = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $antecedentesOdontologicos = null;

    public function __construct()
    {
        $this->creado = new \DateTime();
        $this->fechaApertura = new \DateTime();
        $this->usaSedaDental = false;
        $this->fumador = false;
        $this->consumeAlcohol = false;
        $this->bruxismo = false;
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

    public function getFechaApertura(): ?\DateTime
    {
        return $this->fechaApertura;
    }

    public function setFechaApertura(\DateTime $fechaApertura): static
    {
        $this->fechaApertura = $fechaApertura;

        return $this;
    }

    public function getMotivoConsultaInicial(): ?string
    {
        return $this->motivoConsultaInicial;
    }

    public function setMotivoConsultaInicial(?string $motivoConsultaInicial): static
    {
        $this->motivoConsultaInicial = $motivoConsultaInicial;

        return $this;
    }

    public function getAntecedentesMedicos(): ?string
    {
        return $this->antecedentesMedicos;
    }

    public function setAntecedentesMedicos(?string $antecedentesMedicos): static
    {
        $this->antecedentesMedicos = $antecedentesMedicos;

        return $this;
    }

    public function getAlergias(): ?string
    {
        return $this->alergias;
    }

    public function setAlergias(?string $alergias): static
    {
        $this->alergias = $alergias;

        return $this;
    }

    public function getmedicamentosActuales(): ?string
    {
        return $this->medicamentosActuales;
    }

    public function setmedicamentosActuales(?string $medicamentosActuales): static
    {
        $this->medicamentosActuales = $medicamentosActuales;

        return $this;
    }

    public function getUltimaVisitaOdontologo(): ?\DateTime
    {
        return $this->ultimaVisitaOdontologo;
    }

    public function setUltimaVisitaOdontologo(?\DateTime $ultimaVisitaOdontologo): static
    {
        $this->ultimaVisitaOdontologo = $ultimaVisitaOdontologo;

        return $this;
    }

    public function getMotivoUltimaVisita(): ?string
    {
        return $this->motivoUltimaVisita;
    }

    public function setMotivoUltimaVisita(?string $motivoUltimaVisita): static
    {
        $this->motivoUltimaVisita = $motivoUltimaVisita;

        return $this;
    }

    public function getFrecuenciaCepillado(): ?string
    {
        return $this->frecuenciaCepillado;
    }

    public function setFrecuenciaCepillado(?string $frecuenciaCepillado): static
    {
        $this->frecuenciaCepillado = $frecuenciaCepillado;

        return $this;
    }

    public function isUsaSedaDental(): ?bool
    {
        return $this->usaSedaDental;
    }

    public function setUsaSedaDental(bool $usaSedaDental): static
    {
        $this->usaSedaDental = $usaSedaDental;

        return $this;
    }

    public function isFumador(): ?bool
    {
        return $this->fumador;
    }

    public function setFumador(bool $fumador): static
    {
        $this->fumador = $fumador;

        return $this;
    }

    public function getCigarrillosDia(): ?int
    {
        return $this->cigarrillosDia;
    }

    public function setCigarrillosDia(?int $cigarrillosDia): static
    {
        $this->cigarrillosDia = $cigarrillosDia;

        return $this;
    }

    public function isConsumeAlcohol(): ?bool
    {
        return $this->consumeAlcohol;
    }

    public function setConsumeAlcohol(bool $consumeAlcohol): static
    {
        $this->consumeAlcohol = $consumeAlcohol;

        return $this;
    }

    public function getFrecuenciaAlcohol(): ?string
    {
        return $this->frecuenciaAlcohol;
    }

    public function setFrecuenciaAlcohol(?string $frecuenciaAlcohol): static
    {
        $this->frecuenciaAlcohol = $frecuenciaAlcohol;

        return $this;
    }

    public function isBruxismo(): ?bool
    {
        return $this->bruxismo;
    }

    public function setBruxismo(bool $bruxismo): static
    {
        $this->bruxismo = $bruxismo;

        return $this;
    }

    public function getPresionArterial(): ?string
    {
        return $this->presionArterial;
    }

    public function setPresionArterial(?string $presionArterial): static
    {
        $this->presionArterial = $presionArterial;

        return $this;
    }

    public function getFrecuenciaCardiaca(): ?int
    {
        return $this->frecuenciaCardiaca;
    }

    public function setFrecuenciaCardiaca(?int $frecuenciaCardiaca): static
    {
        $this->frecuenciaCardiaca = $frecuenciaCardiaca;

        return $this;
    }

    public function getTemperatura(): ?string
    {
        return $this->temperatura;
    }

    public function setTemperatura(?string $temperatura): static
    {
        $this->temperatura = $temperatura;

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

    public function getAntecedentesOdontologicos(): ?string
    {
        return $this->antecedentesOdontologicos;
    }

    public function setAntecedentesOdontologicos(?string $antecedentesOdontologicos): static
    {
        $this->antecedentesOdontologicos = $antecedentesOdontologicos;

        return $this;
    }
}
