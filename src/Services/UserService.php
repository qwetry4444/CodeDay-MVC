<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Models\User;
use App\Models\UserProgress;


class UserService
{
    public function __construct(
        private DatabaseInterface $db
    ) {
    }
    private function getProgress(int $id_progress): UserProgress
    {
        $statistics = $this->db->first('user_progress', ['id'=> $id_progress]);
        return new UserProgress(
            $statistics['id'],
            $statistics['count_solved_easy_tasks'],
            $statistics['count_solved_middle_tasks'],
            $statistics['count_solved_hard_tasks'],
            $statistics['count_solved_tasks_with_c'],
            $statistics['count_solved_tasks_with_cpp'],
            $statistics['count_solved_tasks_with_python'],
        );
    }

}