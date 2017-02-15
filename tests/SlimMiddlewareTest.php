<?php

namespace Interop\Http\Message\Strategies\Examples\Slim;

use Interop\Http\Message\Strategies\ServerRequestResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

class SlimMiddlewareTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function requestFactory($envData = [])
    {
        return Request::createFromEnvironment(Environment::mock($envData));
    }

    public function testSlimMiddlewareShouldImplementsServerRequestResponseInterface()
    {
        $this->assertInstanceOf(ServerRequestResponseInterface::class, new SlimMiddleware());
    }

    public function testSlimMiddlewareShouldSayHello()
    {
        $sut = new SlimMiddleware();
        $request = $this->requestFactory()->withAttribute('name', 'world');
        $this->assertEquals('Hello world!', ''.$sut($request)->getBody());
    }

    public function testSlimMiddlewareShouldBePoweredByUnicorns()
    {
        $sut = new SlimMiddleware();
        $request = $this->requestFactory()->withAttribute('name', 'world');
        $response = new Response();
        $this->assertEquals(['Unicorns'], $sut($request, $response)->getHeader('X-Powered-By'));
    }
}
