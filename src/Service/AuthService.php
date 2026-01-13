<?php
namespace App\Service;

use App\Repository\UsuarioSistemaRepository;
use Doctrine\Persistence\ManagerRegistry;

class AuthService{
    private $usuarioSistemaRepository;
    private $conn;

    public function __construct(
        UsuarioSistemaRepository $usuarioSistemaRepository,
        ManagerRegistry $registry
    )
    {
        $this->usuarioSistemaRepository = $usuarioSistemaRepository;
        $this->conn = $registry->getConnection();
    }

    public function login(string $username, string $password):array { 
        $usuario = $this->usuarioSistemaRepository->findByUsername($username);

        //validar si el usuario existe
        if ($usuario === false) {
            return [
                'success' => false,
                'message' => 'Usuario no encontrado'
            ];
        }
        //validar si esta activo
        if ($usuario['estado'] !== 'activo') {
            return [
                'success' => false,
                'message' => 'Usuario inactivo'
            ];
        }

        if ($usuario['intento_fallido'] >= 3) {
            // Usuario tiene 3+ intentos fallidos, verificar tiempo de bloqueo
            if (empty($usuario['ultimo_intento_fallido'])) {
                $this->usuarioSistemaRepository->resetFailedAttempts($usuario['id']);
            }else{
                 // 2) Convertir la fecha a timestamp
                $tiempoUltimoIntento = strtotime($usuario['ultimo_intento_fallido']);
                if ($tiempoUltimoIntento === false) {
                    // Fecha inválida → limpiar intentos
                    $this->usuarioSistemaRepository->resetFailedAttempts($usuario['id']);
                }else{
                    $tiempoActual = time();
                    $diferencia = $tiempoActual - $tiempoUltimoIntento;

                    if ($diferencia < 60) {
                        // No ha pasado 1 minuto, sigue bloqueado
                        $segundosRestantes = 60 - $diferencia;
                        return [
                            'success' => false,
                            'message' => "Cuenta bloqueada. Intenta de nuevo en $segundosRestantes segundos."
                        ];
                    } else {
                        // Ya pasó 1 minuto, puede intentar de nuevo
                        $this->usuarioSistemaRepository->resetFailedAttempts($usuario['id']);
                    }
                }
            }
        }

        //validacion de contraseña
        if (password_verify($password,$usuario['password'])) {
            //resetear intentos fallidos
            $this->usuarioSistemaRepository->resetFailedAttempts($usuario['id']);
            //generar token seguro
            $token = bin2hex(random_bytes(32));

            //Definir tiempo de expiracion del token (1 dia)
            $expiracion = (new \DateTimeImmutable('+1 day'))->format('Y-m-d H:i:s');
            $saveToken = $this->usuarioSistemaRepository->saveToken($token,$expiracion,$usuario['id']);

            if (!$saveToken) {
                return ['success'=>false, 'message'=>'No se pudo crear sesión'];
            }
            
            return [
                'success' => true,
                'message' => 'Login exitoso',
                'token' => $token,
                'user' => [
                    'id' => $usuario['id'],
                    'username' => $usuario['username'],
                    'nombre' => $usuario['nombre'],
                    'email' => $usuario['email'],
                    'rol' => $usuario['rol']
                ]
            ];
        } else {
            //incrementar intentos fallidos
            $this->usuarioSistemaRepository->incrementFailedAttempts($usuario['id']);
            return [
                'success' => false,
                'message' => 'Contraseña incorrecta'
            ];
        }
    }

    public function validateToken(string $token): array{

        $tokenData = $this->usuarioSistemaRepository->findUserByToken($token);

        if ($tokenData === false) {
            return[
                'success' => false,
                'message' => 'Token invalido o expirado'
            ];
        }

        return [
            'success' => true,
            'user' => $tokenData
        ];
    }

    public function logout(string $token): array{
        $deleteToken = $this->usuarioSistemaRepository->deleteToken($token);

        if ($deleteToken === false) {
            return [
                'success' => true,
                'message' => 'Sesion ya ha sido cerrada anteriormente'
            ];
        }

        return[
            'success' => true,
            'message' => 'Token eliminado exitosamente'
        ];
    }
}