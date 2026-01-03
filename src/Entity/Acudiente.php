<?php

namespace App\Entity;

use App\Repository\AcudienteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcudienteRepository::class)]
#[ORM\Table(name: 'acudiente')]
class Acudiente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuario $usuario = null;

    #[ORM\Column(length: 100)]
    private ?string $nombreAcompaniante = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TipoDocumento $tipoDocumentoAcompaniante = null;

    #[ORM\Column(length: 20)]
    private ?string $numeroDocumentoAcompaniante = null;

    #[ORM\Column(length: 50)]
    private ?string $telefonoAcompaniante = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observaciones = null;

    #[ORM\Column]
    private ?\DateTime $creado = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $actualizado = null;

    #[ORM\Column(length: 50)]
    private ?string $parentesco = null;

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

    public function getNombreAcompaniante(): ?string
    {
        return $this->nombreAcompaniante;
    }

    public function setNombreAcompaniante(string $nombreAcompaniante): static
    {
        $this->nombreAcompaniante = $nombreAcompaniante;

        return $this;
    }

    public function getTipoDocumentoAcompaniante(): ?TipoDocumento
    {
        return $this->tipoDocumentoAcompaniante;
    }

    public function setTipoDocumentoAcompaniante(?TipoDocumento $tipoDocumentoAcompaniante): static
    {
        $this->tipoDocumentoAcompaniante = $tipoDocumentoAcompaniante;

        return $this;
    }

    public function getNumeroDocumentoAcompaniante(): ?string
    {
        return $this->numeroDocumentoAcompaniante;
    }

    public function setNumeroDocumentoAcompaniante(string $numeroDocumentoAcompaniante): static
    {
        $this->numeroDocumentoAcompaniante = $numeroDocumentoAcompaniante;

        return $this;
    }

    public function getTelefonoAcompaniante(): ?string
    {
        return $this->telefonoAcompaniante;
    }

    public function setTelefonoAcompaniante(string $telefonoAcompaniante): static
    {
        $this->telefonoAcompaniante = $telefonoAcompaniante;

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

    public function getParentesco(): ?string
    {
        return $this->parentesco;
    }

    public function setParentesco(string $parentesco): static
    {
        $this->parentesco = $parentesco;

        return $this;
    }
}
