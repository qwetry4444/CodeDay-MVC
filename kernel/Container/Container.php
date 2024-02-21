<?php

namespace App\Kernel\Container;

use App\Kernel\Router\Router;
use App\Kernel\http\Request;

class Container
{
    public readonly Request $request;
    public readonly Router $router;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices()
    {
        $this->request = Request::createFromGlobals();
        $this->router = new Router();
    }
}