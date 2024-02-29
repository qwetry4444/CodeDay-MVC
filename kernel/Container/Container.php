<?php

namespace App\Kernel\Container;


use App\Kernel\Router\RouterInterface;
use App\Kernel\Router\Router;
use App\Kernel\http\RequestInterface;
use App\Kernel\http\Request;
use App\Kernel\View\ViewInterface;
use App\Kernel\View\View;
use App\Kernel\Config\ConfigInterface;
use App\Kernel\Config\Config;
use App\Kernel\Http\RedirectInterface;
use App\Kernel\Http\Redirect;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Database\Database;
use App\Kernel\Session\SessionInterface;
use App\Kernel\Session\Session;
use App\Kernel\Auth\AuthInterface;
use App\Kernel\Auth\Auth;
use App\Kernel\Storage\StorageInterface;
use App\Kernel\Storage\Storage;



class Container
{
    public readonly RequestInterface $request;
    public readonly RouterInterface $router;
    public readonly ViewInterface $view;
    public readonly ConfigInterface $config;
    public readonly SessionInterface $session;
    public readonly RedirectInterface $redirect;
    public readonly AuthInterface $auth;
    public readonly DatabaseInterface $database;
    public readonly StorageInterface $storage;
    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices()
    {
        $this->request = Request::createFromGlobals();
        $this->config = new Config();
        $this->redirect = new Redirect();
        $this->storage = new Storage($this->config);
        $this->database = new Database($this->config);
        $this->session = new Session();

        $this->auth = new Auth(
            $this->database, 
            $this->session, 
            $this->config);
        
        $this->view = new View($this->session, $this->auth);

        $this->router = new Router(
            $this->view, 
            $this->request, 
            $this->redirect,
            $this->session, 
            $this->database, 
            $this->auth,
            $this->storage);

    }
}