<?php

namespace Interop\Http\Message\Strategies\Examples\Slim\Helpers;

use Slim\Http\Response;

class ResponseFactory implements \Interop\Http\Factory\ResponseFactoryInterface
{
    /**
     * Create a new response.
     *
     * @param int $code HTTP status code
     *
     * @return ResponseInterface
     */
    public function createResponse($code = 200)
    {
        return new Response($code);
    }
}
