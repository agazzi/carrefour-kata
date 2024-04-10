<?php

namespace App\Client;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\TraceableHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FakeStoreClient
{
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $client;

    /**
     * @param HttpClientInterface $client
     * @param ParameterBagInterface $bag
     */
    public function __construct(HttpClientInterface $client, ParameterBagInterface $bag)
    {
        $params = $bag->get('fakestore');

        $this->client = $client->withOptions([
            'base_uri' => $params['endpoint'],
        ]);
    }

    public function getClient(): HttpClientInterface
    {
        return $this->client;
    }
}
