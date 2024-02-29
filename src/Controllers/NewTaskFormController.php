<?php

namespace App\Controllers;

use App\Kernel\View\View;
use App\Kernel\Controller\Controller;
use App\Services\TaskService;

class NewTaskFormController extends Controller
{
    private TaskService $service;
    private array $inputNames = ['taskName', 'topic', 'complexity', 'description'];

    public function index() : void
    {
        $this->view('newTaskForm', [
            'request' => $this->request(),
        ]);

        $this->request()->updateCookieMany($this->inputNames);
    }

    public function add() : void
    {

        $inputNameValue = [];

        foreach($this->inputNames as $name)
        {
            $inputNameValue[$name] = $this->request()->input($name);
        }
        $filePath = $this->request()->file('tests')->move('tests');

        $inputNameValue['tests'] = $filePath;

        $this->request()->setCookieMany($inputNameValue);

        $this->service()->store(
            $this->request()->input('taskName'),
            $this->request()->input('topic'),
            $this->request()->input('complexity'),
            $this->request()->input('description'),
            $this->request()->file('tests'),
        );
        
        $this->redirect('home');
    }

    private function service(): TaskService
    {
        if (! isset($this->service)) {
            $this->service = new TaskService($this->db());
        }

        return $this->service;
    }
}