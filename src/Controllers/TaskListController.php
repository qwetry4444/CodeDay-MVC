<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\View\View;
use App\Services\TaskService;

class TaskListController extends Controller
{
    private TaskService $service;

    public function index() : void
    {
        $this->view('taskList', [
            'tasks' => $this->service()->all(),
        ]);
    }

    private function service(): TaskService
    {
        if (! isset($this->service)) {
            $this->service = new TaskService($this->db());
        }

        return $this->service;
    }
}