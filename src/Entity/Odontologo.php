<?php

namespace App\Entity;

use App\Repository\OdontologoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OdontologoRepository::class)]
#[ORM\Table(name: 'odontologo')]
class Odontologo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $registroProfesional = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $especialidad = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telefono = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $firmaDigital = null;

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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getRegistroProfesional(): ?string
    {
        return $this->registroProfesional;
    }

    public function setRegistroProfesional(?string $registroProfesional): static
    {
        $this->registroProfesional = $registroProfesional;

        return $this;
    }

    public function getEspecialidad(): ?string
    {
        return $this->especialidad;
    }

    public function setEspecialidad(?string $especialidad): static
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): static
    {
        $this->telefono = $telefono;

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

    public function getFirmaDigital(): ?string
    {
        return $this->firmaDigital;
    }

    public function setFirmaDigital(?string $firmaDigital): static
    {
        $this->firmaDigital = $firmaDigital;

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
