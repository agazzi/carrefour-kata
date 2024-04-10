<?php

namespace App\Service;

use App\Client\FakeStoreClient;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;

class ProductService
{
    private $client;

    public function __construct(FakeStoreClient $fakestore)
    {
        $this->client = $fakestore->getClient();
    }

    public function getProducts(): array
    {
        $response = $this->client->request(Request::METHOD_GET, '/products');

        return json_decode($response->getContent(), true);
    }

    public function getProductById(int $id): array
    {
        $response = $this->client->request(Request::METHOD_GET, sprintf('/products/%d', $id));

        return json_decode($response->getContent(), true);
    }
}
