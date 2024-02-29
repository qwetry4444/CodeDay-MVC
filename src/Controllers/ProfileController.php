<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\View\View;


class ProfileController extends Controller
{
    public function index() : void
    {
        $this->view('profile');
    }
}