<?php

namespace App\Models;

class TaskStatistics
{
    public function __construct(
        private int $id_statistics,
        private int $count_try,
        private int $count_successful_try,
        private int $solvability_percentage,
        private int $count_like,
        private int $count_dislike,

    ) {
    }

    public function id_statistics(): int
    {
        return $this->id_statistics;
    }

    public function count_try(): string
    {
        return $this->count_try;
    }

    public function count_successful_try(): string
    {
        return $this->count_successful_try;
    }

    public function solvability_percentage(): string
    {
        return $this->solvability_percentage;
    }

    public function count_like(): int
    {
        return $this->count_like;
    }

    public function count_dislike(): string
    {
        return $this->count_dislike;
    }


    // /**
    //  * @return array<Review>
    //  */
    // public function reviews(): array
    // {
    //     return $this->reviews;
    // }


}