<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\AuthService;

final class AuthController extends AbstractController
{
    #[Route('/auth', name: 'app_auth')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AuthController.php',
        ]);
    }

    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function login (Request $request, AuthService $authService): JsonResponse{
       $data = json_decode($request->getContent(), true) ?? [];
        
       $username = $data['username'] ?? '';
       $password = $data['password'] ?? '';
        return new JsonResponse(
            $authService->login(
                $username,
                $password
            )
        );
    }
}
