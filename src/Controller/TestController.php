<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route; 
use App\Service\AuthService;

class TestController extends AbstractController
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    #[Route('/api/test/login', name: 'test_login', methods: ['GET'])]
    public function testLogin(): JsonResponse
    {
        // Cambia estos valores por datos reales de tu BD 
        $resultado = $this->authService->login('Daniela', '123456');
        
        return new JsonResponse($resultado);
    }
}