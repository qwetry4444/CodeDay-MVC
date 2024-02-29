<?php

namespace App\Kernel\Controller;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Config\ConfigInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Http\RedirectInterface;
use App\Kernel\View\View;
use App\Kernel\http\Request;
use App\Kernel\View\ViewInterface;
use App\Kernel\http\RequestInterface;
use App\Kernel\Session\SessionInterface;
use App\Kernel\Storage\StorageInterface;

abstract class Controller
{
    private ViewInterface $view;
    private RequestInterface $request;
    private RedirectInterface $redirect;
    private SessionInterface $session;
    private StorageInterface $storage;
    private DatabaseInterface $database;
    private AuthInterface $auth;


    public function view(string $name, array $data = []) : void
    {
        $this->view->page($name, $data);
    }

    public function setView(ViewInterface $view) : void
    {
        $this->view = $view;
    }

    public function request() : RequestInterface
    {
        return $this->request;
    }

    public function setRequest(RequestInterface $request) : void
    {
        $this->request = $request;
    }

    public function redirect(string $url) : RedirectInterface
    {
        return $this->redirect->to($url);
    }

    public function setRedirect(RedirectInterface $redirect) : void
    {
        $this->redirect = $redirect;
    }

    public function setSession(SessionInterface $session) : void
    {
        $this->session = $session;
    }

    public function session() : SessionInterface
    {
        return $this->session;
    }

    public function setDatabase(DatabaseInterface $database) : void
    {
        $this->database = $database;
    }

    public function db()
    {
        return $this->database;
    }

    public function setAuth(AuthInterface $auth) : void
    {
        $this->auth = $auth;
    }

    public function auth() : AuthInterface
    {
        return $this->auth;
    }

    public function storage(): StorageInterface
    {
        return $this->storage;
    }

    public function setStorage(StorageInterface $storage): void
    {
        $this->storage = $storage;
    }
}