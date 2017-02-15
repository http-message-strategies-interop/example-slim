<?php

namespace Interop\Http\Message\Strategies\Examples\Slim;

require_once 'vendor/autoload.php';

$app = new \Slim\App();
$app->get('/hello/{name}', new SlimMiddleware());
$app->run();
