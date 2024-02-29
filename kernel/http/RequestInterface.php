<?php

namespace App\Kernel\Http;

use App\Kernel\Upload\UploadedFileInterface;

interface RequestInterface
{
    public function getFromCookie(string $key) : mixed;
    public function getFromCookieMany(array $keys) : array;
    public function setCookie(string $key, $value) : void;
    public function setCookieMany(array $data) : void;
    public function updateCookie(string $key) : void;
    public function updateCookieMany(array $data) : void;

    public function deleteCookie(string $key) : void;
    public function deleteCookieMany(array $data) : void;

    public static function createFromGlobals(): static;
    public function file(string $key): ?UploadedFileInterface;
    public function uri() : string;

    public function method() : string;

    public function input(string $key, $default = null) : mixed;
}  