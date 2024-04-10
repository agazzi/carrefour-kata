<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_entrypoint', options: ['expose' => true])]
    #[Template('app/index.html.twig')]
    public function index(): array
    {
        return [];
    }
}
