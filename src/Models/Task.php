<?php

namespace App\Models;

use App\Models\TaskStatistics;

class Task
{
    public function __construct(
        private int $id,
        private int $number,
        private string $name,
        private int $topic,
        private int $complexity,
        private string $description,
        private int $id_statistics,
        private TaskStatistics $statistics,
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function number(): string
    {
        return $this->number;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function topic(): string
    {
        return $this->topic;
    }

    public function complexity(): int
    {
        return $this->complexity;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function task_statistics(): TaskStatistics
    {
        return $this->statistics;
    }


    // /**
    //  * @return array<Review>
    //  */
    // public function reviews(): array
    // {
    //     return $this->reviews;
    // }


}