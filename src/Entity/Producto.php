<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductoRepository::class)]
#[ORM\Table(name: 'producto')]
#[ORM\UniqueConstraint(name: 'unique_codigo', columns: ['codigo'])]
#[ORM\UniqueConstraint(name: 'unique_codigo_barras', columns: ['codigo_barras'])]
class Producto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $codigo = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $codigoBarras = null;

    #[ORM\Column(length: 200)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $categoria = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $unidadMedida = null;

    #[ORM\Column]
    private ?int $stockMinimo = null;

    #[ORM\Column]
    private ?int $stockActual = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $precioCompra = null;

    #[ORM\Column(length: 20)]
    private ?string $estado = null;

    #[ORM\Column]
    private ?\DateTime $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $updatedAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->stockMinimo = 5;
        $this->stockActual = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCodigoBarras(): ?string
    {
        return $this->codigoBarras;
    }

    public function setCodigoBarras(?string $codigoBarras): static
    {
        $this->codigoBarras = $codigoBarras;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(?string $categoria): static
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getUnidadMedida(): ?string
    {
        return $this->unidadMedida;
    }

    public function setUnidadMedida(?string $unidadMedida): static
    {
        $this->unidadMedida = $unidadMedida;

        return $this;
    }

    public function getStockMinimo(): ?int
    {
        return $this->stockMinimo;
    }

    public function setStockMinimo(int $stockMinimo): static
    {
        $this->stockMinimo = $stockMinimo;

        return $this;
    }

    public function getStockActual(): ?int
    {
        return $this->stockActual;
    }

    public function setStockActual(int $stockActual): static
    {
        $this->stockActual = $stockActual;

        return $this;
    }

    public function getPrecioCompra(): ?string
    {
        return $this->precioCompra;
    }

    public function setPrecioCompra(?string $precioCompra): static
    {
        $this->precioCompra = $precioCompra;

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

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
