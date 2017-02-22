<?php

namespace Interop\Http\Message\Strategies\Examples\Slim;

use Interop\Http\Factory\ResponseFactoryInterface;
use Interop\Http\Message\Strategies\ServerRequestResponseInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SlimMiddleware implements ServerRequestResponseInterface
{
    protected $responseFactory;

    public function __construct(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * Process a server request and return the produced response.
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface|null $response
     *
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response = null)
    {
        if ($response === null) {
            $response = $this->responseFactory->createResponse();
        }

        $name = $request->getAttribute('name');
        $response->getBody()->write("Hello $name!");

        return $response->withHeader('X-Powered-By', 'Unicorns');
    }
}
