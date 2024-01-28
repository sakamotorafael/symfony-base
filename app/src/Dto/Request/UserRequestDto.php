<?php

namespace App\Dto\Request;

use Symfony\Component\HttpFoundation\RequestStack;

class UserRequestDto implements \JsonSerializable
{
    private ?string $email = null;
    private array $roles = [];
    private ?string $password = null;

    public function __construct(RequestStack $requestStack)
    {
        $data = json_decode($requestStack->getMainRequest()->getContent(), true);

        $this->email = $data['email'] ?? $this->throwError();
        $this->roles = $data['roles'] ?? $this->throwError();
        $this->password = $data['password'] ?? $this->throwError();
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function throwError(): void
    {
        throw new \Exception('Erro');
    }

    public function jsonSerialize(): array
    {
        return [
            'email' => $this->getEmail(),
            'roles' => $this->getRoles(),
            'password' => $this->getPassword()
        ];
    }
}