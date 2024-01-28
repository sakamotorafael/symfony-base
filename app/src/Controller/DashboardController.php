<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/dashboard', name: 'dashboard_')]
class DashboardController extends AbstractController
{
    public function __construct(
        private Security $security
    )
    {
    }

    #[Route('/', name: 'index', methods: 'GET')]
    public function index(): Response
    {
        $user = $this->security->getUser();

        return $this->render('dashboard/index.html.twig', [
            'username' => $user->getUserIdentifier()
        ]);
    }
}
