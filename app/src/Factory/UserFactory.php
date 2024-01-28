<?php

namespace App\Factory;

use App\Dto\Request\UserRequestDto;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

readonly class UserFactory
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasherInterface
    )
    {
    }

    public function createUserFactory(UserRequestDto $userRequestDto): User
    {
        $user = New User();

        $user
            ->setEmail($userRequestDto->getEmail())
            ->setRoles($userRequestDto->getRoles());

        $this->userPasswordHasherInterface->hashPassword(
            $user,
            $userRequestDto->getPassword()
        );

        return $user;
    }
}