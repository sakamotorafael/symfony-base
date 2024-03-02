<?php

namespace App\Service;

use App\Dto\Request\UserRequestDto;
use App\Entity\User;
use App\Factory\UserFactory;
use App\Repository\UserRepository;

class UserService
{

    public function __construct(
        private readonly UserFactory $userFactory,
        private readonly UserRepository $userRepository
    )
    {
    }

    public function createUser(UserRequestDto $userRequestDto): User
    {
        $user = $this->userFactory->createUserFactory($userRequestDto);

        $this->userRepository->save($user, true);

        return $user;
    }
}