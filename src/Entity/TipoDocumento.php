<?php

namespace App\Entity;

use App\Repository\TipoDocumentoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoDocumentoRepository::class)]
#[ORM\Table(name: 'tipo_documento')]
#[ORM\UniqueConstraint(name: 'unique_codigo', columns: ['codigo'])]
class TipoDocumento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 5)]
    private ?string $codigo = null;

    #[ORM\Column]
    private ?bool $requiereAcompaniante = null;

    #[ORM\Column(length: 20)]
    private ?string $estado = null;

    #[ORM\Column(options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTime $creado = null;

    public function __construct()
    {
        $this->creado = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): static
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function isRequiereAcompaniante(): ?bool
    {
        return $this->requiereAcompaniante;
    }

    public function setRequiereAcompaniante(bool $requiereAcompaniante): static
    {
        $this->requiereAcompaniante = $requiereAcompaniante;

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
}
