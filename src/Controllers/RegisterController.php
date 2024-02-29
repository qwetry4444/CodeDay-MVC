<?php

namespace App\Controllers;

use App\Kernel\View\View;
use App\Kernel\Http\Request;
use App\Kernel\Controller\Controller;


class RegisterController extends Controller
{
    private array $inputNames = ['name', 'email','gender','preferred_pl','phone_number','birthday'];

    public function index() : void
    {
        $this->view('register', [
            'request' => $this->request(),
        ]);
        
        $this->request()->updateCookieMany($this->inputNames);
    }



    public function register()
    {
        $inputNameValue = [];

        foreach($this->inputNames as $name)
        {
            $inputNameValue[$name] = $this->request()->input($name);
        }

        $this->request()->setCookieMany($inputNameValue);

        $inputNameValue['password'] = password_hash($this->request()->input('password'), PASSWORD_DEFAULT);

        $userId = $this->db()->insert('users', $inputNameValue);
    }
}