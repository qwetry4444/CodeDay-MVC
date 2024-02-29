<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\View\View;
use App\Kernel\Http\Request;

class LoginController extends Controller
{
    private array $inputNames = ['email'];
    public function index()
    {
        $this->view('login', [
            'request' => $this->request(),
        ]);
        $this->request()->updateCookieMany($this->inputNames);
    }

    public function login()
    {
        $inputNameValue = [];

        foreach($this->inputNames as $name)
        {
            $inputNameValue[$name] = $this->request()->input($name);
        }

        $this->request()->setCookieMany($inputNameValue);


        $email = $this->request()->input('email');
        $password = $this->request()->input('password');

        if ($this->auth()->attempt($email, $password)) {
            $this->redirect('/');
        }

        $this->session()->set('error', 'Неверный логин или пароль');

        $this->redirect('/login');
    }

    public function logout()
    {
        $this->request()->deleteCookieMany($this->inputNames);

        $this->auth()->logout();

        return $this->redirect('/login');
    }
}