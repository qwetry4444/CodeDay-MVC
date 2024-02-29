<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\View\View;
use App\Services\UserService;

class ProgressController extends Controller
{
    private UserService $service;

    public function index() : void
    {
        $this->view('progress');
    }

    private function service(): UserService
    {
        if (! isset($this->service)) {
            $this->service = new UserService($this->db());
        }

        return $this->service;
    }
}