<?php

namespace App\Repository;

use App\Entity\UsuarioSistema;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsuarioSistema>
*/
class UsuarioSistemaRepository extends ServiceEntityRepository
{

    private $conn;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuarioSistema::class);
        $this->conn = $registry->getConnection();
    }

    public function findByUsername(string $username): array|false
    {
        return $this->conn->executeQuery(
            "SELECT
                id,
                username,
                password,
                nombre,
                email,
                rol,
                odontologo_id,
                estado,
                intento_fallido,
                ultimo_intento_fallido,
                ultimo_acceso
                FROM usuario_sistema WHERE username = :username",
            ['username' => $username]
        )->fetchAssociative();
    }

}
