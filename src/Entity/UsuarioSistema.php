<?php

namespace App\Entity;

use App\Repository\UsuarioSistemaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioSistemaRepository::class)]
#[ORM\Table(name: 'usuario_sistema')]
#[ORM\UniqueConstraint(name: 'unique_username', columns: ['username'])]
class UsuarioSistema
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 20)]
    private ?string $rol = null;

    #[ORM\ManyToOne]
    private ?Odontologo $odontologo = null;

    #[ORM\Column(length: 20)]
    private ?string $estado = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $ultimoAcceso = null;

    #[ORM\Column]
    private ?int $intentoFallido = null;

    #[ORM\Column]
    private ?\DateTime $creado = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $actualizado = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $ultimoIntentoFallido = null;

    public function __construct()
    {
        $this->creado = new \DateTime();
        $this->intentoFallido = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(string $rol): static
    {
        $this->rol = $rol;

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

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    public function getUltimoAcceso(): ?\DateTime
    {
        return $this->ultimoAcceso;
    }

    public function setUltimoAcceso(?\DateTime $ultimoAcceso): static
    {
        $this->ultimoAcceso = $ultimoAcceso;

        return $this;
    }

    public function getIntentoFallido(): ?int
    {
        return $this->intentoFallido;
    }

    public function setIntentoFallido(int $intentoFallido): static
    {
        $this->intentoFallido = $intentoFallido;

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

    public function getUltimoIntentoFallido(): ?\DateTime
    {
        return $this->ultimoIntentoFallido;
    }

    public function setUltimoIntentoFallido(?\DateTime $ultimoIntentoFallido): static
    {
        $this->ultimoIntentoFallido = $ultimoIntentoFallido;

        return $this;
    }
}
