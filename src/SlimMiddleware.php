<?php

namespace Interop\Http\Message\Strategies\Examples\Slim;

use Interop\Http\Message\Strategies\ServerRequestResponseInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Response;

class SlimMiddleware implements ServerRequestResponseInterface
{
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
            $response = new Response();
        }

        $name = $request->getAttribute('name');
        $response->getBody()->write("Hello $name!");

        return $response->withHeader('X-Powered-By', 'Unicorns');
    }
}
