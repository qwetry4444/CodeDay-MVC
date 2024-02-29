<?php

namespace App\Models;

class UserProgress
{
    public function __construct(
        private int $id,
        private int $count_solved_easy_tasks,
        private int $count_solved_middle_tasks,
        private int $count_solved_hard_tasks,
        private int $count_solved_tasks_with_c,
        private int $count_solved_tasks_with_cpp,
        private int $count_solved_tasks_with_python,
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function count_solved_easy_tasks(): string
    {
        return $this->count_solved_easy_tasks;
    }

    public function count_solved_middle_tasks(): string
    {
        return $this->count_solved_middle_tasks;
    }

    public function count_solved_hard_tasks(): string
    {
        return $this->count_solved_hard_tasks;
    }

    public function count_solved_tasks_with_c(): string
    {
        return $this->count_solved_tasks_with_c;
    }

    public function count_solved_tasks_with_cpp(): string
    {
        return $this->count_solved_tasks_with_cpp;
    }

    public function count_solved_tasks_with_python(): string
    {
        return $this->count_solved_tasks_with_python;
    }
}