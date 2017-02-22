<?php

namespace Interop\Http\Message\Strategies\Examples\Slim;

use Interop\Http\Message\Strategies\Examples\Slim\Helpers\ResponseFactory;

require_once 'vendor/autoload.php';
require_once 'tests/Helpers/ResponseFactory.php';

$app = new \Slim\App();
$app->get('/hello/{name}', new SlimMiddleware(new ResponseFactory()));
$app->run();
