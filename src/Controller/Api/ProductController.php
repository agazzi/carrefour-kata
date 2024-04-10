<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/v1/products', name: 'api_v1_products_')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'list', methods: [Request::METHOD_GET])]
    public function index(): Response
    {
        return $this->json([]);
    }
}
