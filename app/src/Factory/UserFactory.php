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

        $passwordHashed = $this->userPasswordHasherInterface->hashPassword(
            $user,
            $userRequestDto->getPassword()
        );

        $user->setPassword($passwordHashed);

        return $user;
    }
}