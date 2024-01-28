<?php

namespace App\Dto;

use Symfony\Component\Security\Core\User\UserInterface;

class CanvasDto implements \JsonSerializable
{
    private UserInterface $user;
    private string $data;

    public function __construct(array $data, UserInterface $user)
    {
        $this->data = $data['canvasData'] ?? $this->throwError();
        $this->user = $user;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getUser(): UserInterface
    {
        return $this->user;
    }

    public function throwError(): void
    {
        throw new \Exception('Limpeza não encontrada');
    }

    public function jsonSerialize(): array
    {
        return [
            'canvasData' => $this->getData(),
            'user' => $this->getUser()
        ];
    }
}
