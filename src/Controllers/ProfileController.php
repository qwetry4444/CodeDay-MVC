<?php

namespace App\Controllers;

use App\Kernel\View\View;
use App\Kernel\Controller\Controller;

class ProfileController extends Controller
{
    public function index() : void
    {
        $this->view('profile');
    }
}