<?php

namespace App\Entity;

use App\Repository\LotesInventarioRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LotesInventarioRepository::class)]
#[ORM\Table(name: 'lotes_inventario')]
class LotesInventario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Producto $producto = null;

    #[ORM\Column(length: 50)]
    private ?string $numeroLote = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $fechaIngreso = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $fechaVencimiento = null;

    #[ORM\Column]
    private ?int $cantidadInicial = null;

    #[ORM\Column]
    private ?int $cantidadActual = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $precioCompra = null;

    #[ORM\ManyToOne]
    private ?Proveedor $proveedor = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $numeroFactura = null;

    #[ORM\Column(length: 20)]
    private ?string $estado = null;

    #[ORM\Column]
    private ?int $diasAlertaVencimiento = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observaciones = null;

    #[ORM\Column]
    private ?\DateTime $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $updatedAt = null;

      public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->fechaIngreso = new \DateTime();
        $this->diasAlertaVencimiento = 30;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProducto(): ?Producto
    {
        return $this->producto;
    }

    public function setProducto(?Producto $producto): static
    {
        $this->producto = $producto;

        return $this;
    }

    public function getNumeroLote(): ?string
    {
        return $this->numeroLote;
    }

    public function setNumeroLote(string $numeroLote): static
    {
        $this->numeroLote = $numeroLote;

        return $this;
    }

    public function getFechaIngreso(): ?\DateTime
    {
        return $this->fechaIngreso;
    }

    public function setFechaIngreso(\DateTime $fechaIngreso): static
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    public function getFechaVencimiento(): ?\DateTime
    {
        return $this->fechaVencimiento;
    }

    public function setFechaVencimiento(\DateTime $fechaVencimiento): static
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    public function getCantidadInicial(): ?int
    {
        return $this->cantidadInicial;
    }

    public function setCantidadInicial(int $cantidadInicial): static
    {
        $this->cantidadInicial = $cantidadInicial;

        return $this;
    }

    public function getCantidadActual(): ?int
    {
        return $this->cantidadActual;
    }

    public function setCantidadActual(int $cantidadActual): static
    {
        $this->cantidadActual = $cantidadActual;

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

    public function getProveedor(): ?Proveedor
    {
        return $this->proveedor;
    }

    public function setProveedor(?Proveedor $proveedor): static
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    public function getNumeroFactura(): ?string
    {
        return $this->numeroFactura;
    }

    public function setNumeroFactura(?string $numeroFactura): static
    {
        $this->numeroFactura = $numeroFactura;

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

    public function getDiasAlertaVencimiento(): ?int
    {
        return $this->diasAlertaVencimiento;
    }

    public function setDiasAlertaVencimiento(int $diasAlertaVencimiento): static
    {
        $this->diasAlertaVencimiento = $diasAlertaVencimiento;

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
