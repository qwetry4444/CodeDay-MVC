<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\View\View;
use App\Services\TaskService;

class TaskController extends Controller
{
    private TaskService $service;

    public function index() : void
    {
        $this->view('task');
    }

    public function show() : void
    {
        $task = $this->service()->find($this->request()->input('task_id'));
        $user = $this->auth()->user();
        $decision = $this->service()->getUserDecision($user->id(), $task->id());

        $this->view('task', [
            'task' => $task,
            'decision'=> $decision,
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