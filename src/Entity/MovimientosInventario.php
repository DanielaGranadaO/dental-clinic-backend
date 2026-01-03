<?php

namespace App\Entity;

use App\Repository\MovimientosInventarioRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Query\Expr\Func;

#[ORM\Entity(repositoryClass: MovimientosInventarioRepository::class)]
#[ORM\Table(name: 'movimientos_inventario')]
class MovimientosInventario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?LotesInventario $lote = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Producto $producto = null;

    #[ORM\Column(length: 20)]
    private ?string $tipoMovimiento = null;

    #[ORM\Column]
    private ?int $cantidad = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $motivo = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?UsuarioSistema $usuarioSistema = null;

    #[ORM\ManyToOne]
    private ?Usuario $paciente = null;

    #[ORM\ManyToOne]
    private ?Cita $cita = null;

    #[ORM\Column]
    private ?\DateTime $fechaMovimiento = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observaciones = null;

    #[ORM\Column]
    private ?\DateTime $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->fechaMovimiento = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLote(): ?LotesInventario
    {
        return $this->lote;
    }

    public function setLote(?LotesInventario $lote): static
    {
        $this->lote = $lote;

        return $this;
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

    public function getTipoMovimiento(): ?string
    {
        return $this->tipoMovimiento;
    }

    public function setTipoMovimiento(string $tipoMovimiento): static
    {
        $this->tipoMovimiento = $tipoMovimiento;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): static
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getMotivo(): ?string
    {
        return $this->motivo;
    }

    public function setMotivo(?string $motivo): static
    {
        $this->motivo = $motivo;

        return $this;
    }

    public function getUsuarioSistema(): ?UsuarioSistema
    {
        return $this->usuarioSistema;
    }

    public function setUsuarioSistema(?UsuarioSistema $usuarioSistema): static
    {
        $this->usuarioSistema = $usuarioSistema;

        return $this;
    }

    public function getPaciente(): ?Usuario
    {
        return $this->paciente;
    }

    public function setPaciente(?Usuario $paciente): static
    {
        $this->paciente = $paciente;

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

    public function getFechaMovimiento(): ?\DateTime
    {
        return $this->fechaMovimiento;
    }

    public function setFechaMovimiento(\DateTime $fechaMovimiento): static
    {
        $this->fechaMovimiento = $fechaMovimiento;

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
}
