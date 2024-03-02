<?php

namespace App\Dto;

use App\Entity\User;

class CanvasDto implements \JsonSerializable
{
    private User $user;
    private string $imageUrl;

    public function __construct(string $imageUrl, User $user)
    {
        $this->imageUrl = $imageUrl;
        $this->user = $user;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function throwError(): void
    {
        throw new \Exception('Base64 não encontrada');
    }

    public function jsonSerialize(): array
    {
        return [
            'imageUrl' => $this->getImageUrl(),
            'user' => $this->getUser()
        ];
    }
}
