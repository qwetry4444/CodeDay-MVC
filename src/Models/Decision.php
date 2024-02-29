<?

namespace App\Models;

class Decision
{
    public function __construct(
        private int $user_id,
        private int $task_id,
        private int $attempts_count,
        private string $programming_language,
        private string $code,
    ){}

    public function user_id()
    {
        return $this->user_id;
    }

    public function task_id()
    {
        return $this->task_id;
    }

    public function attempts_count()
    {
        return $this->attempts_count;
    }

    public function programming_language()
    {
        return $this->programming_language;
    }

    public function code()
    {
        return $this->code;
    }
}