<?php

namespace App\Models;



class User
{
    public function __construct(
        private int $id,
        private string $name,
        private string $email,
        private int $gender,
        private int $preferred_pl,
        private string $phone_number,
        private string $birthday,
        private string $password,
        private int $id_progress,
        private UserProgress $progress,
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function gender(): string
    {
        return $this->gender;
    }

    public function preferred_pl(): string
    {
        return $this->preferred_pl;
    }

    public function phone_number(): string
    {
        return $this->phone_number;
    }

    public function birthday(): string
    {
        return $this->birthday;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function progress(): userProgress
    {
        return $this->progress;
    }
}