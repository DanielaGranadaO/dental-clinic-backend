<?php

namespace App\Security;

use Symfony\Component\Security\Core\User\UserInterface;

class ApiUser implements UserInterface
{
    private int $id;
    private string $username;
    private string $nombre;
    private string $email;
    private string $rol;
    public function __construct(int $id, string $username, string $nombre, string $email, string $rol)
    {
        $this->id = $id;
        $this->username = $username;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->rol = $rol;
    }
    public function getUserIdentifier(): string
    {
        return $this->username;
    }
    public function getRoles(): array
    {
        return [$this->rol];
    }
    public function eraseCredentials(): void {}
}
