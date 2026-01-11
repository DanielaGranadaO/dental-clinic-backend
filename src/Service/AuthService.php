<?php
namespace App\service;

use App\Repository\UsuarioSistemaRepository;
use Doctrine\Persistence\ManagerRegistry;

class AuthService{
    private $usuarioSistemaRepository;
    private $conn;

    public function __construct(
        usuarioSistemaRepository $usuarioSistemaRepository,
        ManagerRegistry $registry
    )
    {
        $this->usuarioSistemaRepository = $usuarioSistemaRepository;
        $this->conn = $registry->getConnection();
    }
}