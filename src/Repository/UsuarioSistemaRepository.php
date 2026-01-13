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

    public function resetFailedAttempts(int $userId): int
    {
        return $this->conn->executeStatement(
            "UPDATE usuario_sistema 
             SET intento_fallido = 0, ultimo_intento_fallido = NULL 
             WHERE id = :id",
            ['id' => $userId]
        );
    }

    public function incrementFailedAttempts(int $userId): int
    {
        return $this->conn->executeStatement(
            "UPDATE usuario_sistema 
             SET intento_fallido = intento_fallido + 1, ultimo_intento_fallido = NOW() 
             WHERE id = :id",
            ['id' => $userId]
        );
    }

    public function saveToken(string $token, string $expiracion, int $userId): bool
    {
        $rows = $this->conn->executeStatement(
            "INSERT INTO user_tokens (user_id, token, expires_at) VALUES (:user_id, :token, :expires_at)",
            [
                'user_id' => $userId,
                'token' => $token,
                'expires_at' => $expiracion
            ]
        );

        return $rows === 1;
    }

    public function findUserByToken(string $token): array|false
    {
        return $this->conn->executeQuery(
            "SELECT us.id, us.username, us.nombre, us.email, us.rol
             FROM usuario_sistema us
             JOIN user_tokens ut ON us.id = ut.user_id
             WHERE ut.token = :token AND ut.expires_at > NOW() LIMIT 1",
            ['token' => $token]
        )->fetchAssociative();
    }

    public function deleteToken(string $token) : bool {
        $rows = $this->conn->executeStatement(
            "DELETE FROM user_tokens WHERE token = :token",
            ['token' => $token]
        );

        return $rows > 0;
    }

}