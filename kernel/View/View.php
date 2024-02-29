<?php

namespace App\Kernel\View;
use App\Kernel\Auth\AuthInterface;
use App\Kernel\Session\SessionInterface;


class View implements ViewInterface
{
    public function __construct(
        private SessionInterface $session,
        private AuthInterface $auth,
    )
    {}

    public function page(string $name, array $data = []) : void
    {
        extract(array_merge($this->defaultData(), $data));

        require_once APP_PATH."/views/pages/$name.php";
    }

    public function component(string $name, array $data = []) : void
    {
        extract(array_merge($this->defaultData(), $data));

        require_once APP_PATH."/views/components/$name.php";
    }

    private function defaultData() : array
    {
        return [
            'view' => $this,
            'sessoin'=> $this->session,
            'auth' => $this->auth,
        ];
    }
}