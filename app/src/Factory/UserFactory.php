<?php

namespace App\Factory;

use App\Dto\Request\UserRequestDto;
use App\Entity\User;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

class UserFactory
{
    public function __construct(
        private PasswordHasherInterface $passwordHasher
    )
    {
    }

    public function createUserFactory(UserRequestDto $userRequestDto): User
    {
        $user = New User();

        $user
            ->setEmail($userRequestDto->getEmail())
            ->setRoles($userRequestDto->getRoles());

        $this->passwordHasher->hash($userRequestDto->getPassword(), $user);

        return $user;
    }
}