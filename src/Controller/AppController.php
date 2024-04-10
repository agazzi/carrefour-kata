<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class AppController extends AbstractController
{
    #[Route('/app/{pattern}', name: 'app_entrypoint', requirements: ['pattern' => '^.+'], options: ['expose' => true], defaults: ['pattern' => 'entrypoint'])]
    #[Template('app/index.html.twig')]
    public function index(): array
    {
        return [];
    }
}
