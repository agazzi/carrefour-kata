<?php

namespace App\EventListener;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelInterface;
use Twig\Environment;

class JavascriptListener
{
    /**
     * @var Environment
     */
    private Environment $twig;

    /**
     * @var ParameterBagInterface
     */
    private ParameterBagInterface $bag;

    /**
     * @var string
     */
    private string $env;

    /**
     * @var string
     */
    private const APP_ROUTE = [
        'app_entrypoint',
    ];

    /**
     * @param Environment $twig
     * @param ParameterBagInterface $bag
     * @param KernelInterface $kernel
     */
    public function __construct(Environment $twig, ParameterBagInterface $bag, KernelInterface $kernel)
    {
        $this->env = $kernel->getEnvironment();
        $this->twig = $twig;
        $this->bag = $bag;
    }

    /**
     * @param ViewEvent $event
     */
    public function onKernelView(ViewEvent $event): void
    {
        $request = $event->getRequest();

        if (in_array($event->getRequest()->get('_route'), self::APP_ROUTE)) {
            $this->twig->addGlobal('storage', [
                'env' => $this->env,
                'request' => [
                    'host' => $request->getSchemeAndHttpHost(),
                ],
            ]);
        }
    }
}