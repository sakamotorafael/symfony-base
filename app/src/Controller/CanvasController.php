<?php

namespace App\Controller;

use App\Dto\CanvasDto;
use App\Service\CanvasService;
use App\Service\CloudinaryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/canvas', name: 'canvas_')]
class CanvasController extends AbstractController
{

    public function __construct(
        private readonly Security $security,
        private readonly CanvasService $canvasService,
        private readonly CloudinaryService $cloudinaryService
    )
    {
    }

    #[Route('/', name: 'create', methods: 'POST')]
    public function create(Request $request): Response
    {
        try {
            $user = $this->security->getUser();
            $data = $request->request->all();

            $imageUrl = $this->cloudinaryService->sendImageFileToCloudinaryAndGetReference($data['canvasData']);

            $canvasDto = new CanvasDto($imageUrl, $user);

            $this->canvasService->createUser($canvasDto);

            $this->addFlash('success', 'Canvas salvo com sucesso!');
            return $this->redirectToRoute('dashboard_index');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Oops! Não foi possível realizar esta ação...' . ' Erro: ' . $e->getMessage() );

            return $this->redirectToRoute('dashboard_index');
        }
    }
}