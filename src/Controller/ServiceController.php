<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/service/{name}', name: 'show_service')]

    public function showService($name): Response
    {
        return $this->render('service/showService.html.twig', [
            'controller_name' => 'ServiceController',
            'name' => $name
        ]);
    }
    #[Route('/go-to-index', name: 'go_to_index')]
    public function goToIndex(): Response
    {
        return $this->redirectToRoute('app_home');
    }
}
