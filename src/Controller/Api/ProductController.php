<?php

namespace App\Controller\Api;

use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/v1/products', name: 'api_v1_products_')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'list', methods: [Request::METHOD_GET])]
    public function list(ProductService $ps): Response
    {
        return $this->json([
            'products' =>  $ps->getProducts()
        ]);
    }

    #[Route('/{id}', name: 'item', methods: [Request::METHOD_GET])]
    public function item(int $id, ProductService $ps): Response
    {
        return $this->json([
            'product' => $ps->getProductById($id)
        ]);
    }
}
