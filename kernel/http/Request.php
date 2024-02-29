<?php

namespace App\Kernel\Http;
use App\Kernel\Upload\UploadedFileInterface;
use App\Kernel\Upload\UploadedFile;

class Request implements RequestInterface
{
    public function __construct(
        public readonly array $get,
        public readonly array $post,
        public readonly array $server,
        public readonly array $files,
        public readonly array $cookie,
    ){}

    public static function createFromGlobals(): static
    {
        return new static(
            $_GET,
            $_POST,
            $_SERVER,
            $_FILES,
            $_COOKIE
        );
    }

    public function uri() : string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }
    
    public function method() : string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function input(string $key, $default = null) : mixed
    {
        return isset($this->files[$key]) ? $this->files[$key] : $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function file(string $key): ?UploadedFileInterface
    {
        if (! isset($this->files[$key])) {
            return null;
        }

        return new UploadedFile(
            $this->files[$key]['name'],
            $this->files[$key]['type'],
            $this->files[$key]['tmp_name'],
            $this->files[$key]['error'],
            $this->files[$key]['size'],
        );
    }

    
    public function getFromCookie(string $key) : mixed 
    {
        if (isset($this->cookie[$key]))
        {
            return $this->cookie[$key];
        }
        return "";
    }

    public function getFromCookieMany(array $keys) : array
    {
        $values = [];
        foreach ($keys as $key)
        {
            $values[$key] = $this->getFromCookie($key);
        }
        return $values;
    }

    public function setCookie(string $key, $value) : void
    {
        setcookie($key, $value, strtotime('+1 hour'));
    }

    public function setCookieMany(array $data) : void
    {
        foreach ($data as $key => $value)
        {
            setCookie($key, $value);
        }
    }

    public function updateCookie(string $key) : void
    {
        $this->setCookie($key, $this->cookie[$key]);
    }

    public function updateCookieMany(array $data) : void
    {
        foreach ($data as $key)
        {
            $this->updateCookie($key);
        }
    }

    public function deleteCookie(string $key) : void
    {
        if (isset($this->cookie[$key])) {
            setcookie($key, "", time() - strtotime("+1 hour"));
        }
    }

    public function deleteCookieMany(array $keys) : void
    {
        foreach ($keys as $key)
        {
            $this->deleteCookie($key);
        }
    }
}