<?php

namespace App\Services;

use App\Kernel\Auth\User;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;
use App\Models\Decision;
use App\Models\Task;
use App\Models\TaskStatistics;


class TaskService
{
    public function __construct(
        private DatabaseInterface $db
    ) {
    }

    public function store(string $name, int $topic, int $complexity, string $description, UploadedFileInterface  $image): false|int
    {
    
        $lastTask = $this->getLastTask();
        return $this->db->insert('tasks', [
            'number' => $lastTask->number() + 1,
            'name' => $name,
            'topic' => $topic,
            'complexity' => $complexity,
            'description' => $description,
        ]);
    }

    public function all(): array
    {
        $tasks = $this->db->get('tasks');

        return array_map(function ($task) {
            return new Task(
                $task['id'],
                $task['number'],
                $task['name'],
                $task['topic'],
                $task['complexity'],
                $task['description'],
                $task['id_statistics'],
                $this->getStatistics($task['id_statistics']),
            );
        }, $tasks);
    }

    public function find(int $id): ?Task
    {
        $task = $this->db->first('tasks', [
            'id' => $id,
        ]);

        if (! $task) {
            return null;
        }

        return new Task(
            $task['id'],
            $task['number'],
            $task['name'],
            $task['topic'],
            $task['complexity'],
            $task['description'],
            $task['id_statistics'],
            $this->getStatistics($task['id_statistics']),
        );
    }

    private function getStatistics(int $id_statistics): TaskStatistics
    {
        $statistics = $this->db->first('task_statistics', ['id_statistics'=> $id_statistics]);
        return new TaskStatistics(
            $statistics['id_statistics'],
            $statistics['count_try'],
            $statistics['count_successful_try'],
            $statistics['solvability_percentage'],
            $statistics['count_like'],
            $statistics['count_dislike'],
        );
    }

    private function getLastTask()
    {
        $lastTask = $this->db->get('tasks', order: ['number' => 'DESC'], limit: '1');
        
        return new Task(
            $lastTask[0]['id'],
            $lastTask[0]['number'],
            $lastTask[0]['name'],
            $lastTask[0]['topic'],
            $lastTask[0]['complexity'],
            $lastTask[0]['description'],
            $lastTask[0]['id_statistics'],
            $this->getStatistics($lastTask[0]['id_statistics']),
        );
    }

    public function getUserDecision(int $user_id, int $task_id)
    {
        $userDecision = $this->db->first('decision_process', [
            'user_id'=> $user_id,
            'task_id'=> $task_id
        ]);
        //dd($userDecision);
        return new Decision(
            $userDecision['user_id'],
            $userDecision['task_id'],
            $userDecision['attempts_count'],
            $userDecision['programming_language'],
            $userDecision['code'],
        );
    }
}