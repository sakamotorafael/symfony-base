<?php

namespace App\Factory;

use App\Dto\CanvasDto;
use App\Dto\Request\UserRequestDto;
use App\Entity\Canvas;

readonly class CanvasFactory
{
    public function __construct()
    {
    }

    public function createCanvas(CanvasDto $canvasDto): Canvas
    {
        $canvas = New Canvas();

        $canvas
            ->setUser($canvasDto->getUser())
            ->setData($canvasDto->getImageUrl());

        return $canvas;
    }
}