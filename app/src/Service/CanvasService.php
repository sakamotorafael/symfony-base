<?php

namespace App\Service;

use App\Dto\CanvasDto;
use App\Entity\Canvas;
use App\Factory\CanvasFactory;
use App\Repository\CanvasRepository;

readonly class CanvasService
{

    public function __construct(
        private CanvasRepository $canvasRepository,
        private CanvasFactory    $canvasFactory
    )
    {
    }

    public function createUser(CanvasDto $canvasDto): Canvas
    {
        $canvas = $this->canvasFactory->createCanvas($canvasDto);

        $this->canvasRepository->save($canvas, true);

        return $canvas;
    }
}