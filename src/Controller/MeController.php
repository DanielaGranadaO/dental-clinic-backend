<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\AuthService;

final class MeController extends AbstractController
{
    #[Route('/me', name: 'app_me')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MeController.php',
        ]);
    }
    
    #[Route('/api/me', name:'api_me', methods:['GET'])]
    public function getMe(Request $request, AuthService $authService): JsonResponse{
        $requestToken = $request->headers->get('Authorization');

        if (!$requestToken) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Falta token'
            ],401);
        }

        if (!str_starts_with($requestToken, 'Bearer ')) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Formato de token inválido'
            ], 401);
        }
        
        $token = substr($requestToken, 7);
        $result = $authService->validateToken($token);
        $status = $result['success'] ? 200 : 401;

        return new JsonResponse ($result, $status);
    }

    #[Route('/api/logout', name:'api_logout', methods:['POST'])]
    public function logOut(Request $request, AuthService $authService): JsonResponse{
        $requestToken = $request->headers->get('Authorization');

          if (!$requestToken) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Falta token'
            ],401);
        }

        if (!str_starts_with($requestToken, 'Bearer ')) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Formato de token inválido'
            ], 401);
        }

        $token = substr($requestToken, 7);
        $result = $authService->logOut($token);

        return new JsonResponse($result, 200);
    }
}
