<?php

namespace App\Controller\Api;

use App\Dto\Request\UserRequestDto;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/user', name: 'user_')]
class UserController extends ApiController
{
    public function __construct(
        private readonly UserService $userService
    )
    {
    }

    #[Route('/', name: 'create', methods: ['POST'])]
    public function createUser(UserRequestDto $userRequestDto): Response
    {
        try {
            $user = $this->userService->createUser($userRequestDto);

            return $this->respondWithSuccess($user->jsonSerialize(), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->respondWithException($exception);
        }
    }
}