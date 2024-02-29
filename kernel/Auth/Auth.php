<?

namespace App\Kernel\Auth;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Session\SessionInterface;
use App\Kernel\Config\ConfigInterface;
use App\Models\User;
use App\Models\UserProgress;



class Auth implements AuthInterface
{
    public function __construct(
        private DatabaseInterface $db,
        public SessionInterface $session,
        private ConfigInterface $config
    ) {
    }

    public function attempt(string $username, string $password): bool
    {
        $user = $this->db->first($this->table(), [
            $this->username() => $username,
        ]);

        if (! $user) {
            return false;
        }

        if (! password_verify($password, $user[$this->password()])) {
            return false;
        }
        $this->session->set($this->sessionField(), $user['id']);

        return true;
    }

    public function check(): bool
    {
        return $this->session->has($this->sessionField());
    }

    public function user(): ?User
    {
        if (! $this->check()) {
            return null;
        }

        $user = $this->db->first($this->table(), [
            'id' => $this->session->get($this->sessionField()),
        
        
        ]);

        if ($user) {
            return new User(
                $user['id'],
                $user['name'],
                $user[$this->username()],
                $user['gender'],
                $user['preferred_pl'],
                $user['phone_number'],
                $user['birthday'],
                $user[$this->password()],
                $user['id_progress'],
                $this->getProgress($user['id_progress']),
            );
        }

        return null;
    }

    public function logout(): void
    {
        $this->session->remove($this->sessionField());
    }

    public function table(): string
    {
        return $this->config->get('auth.table', 'users');
    }

    public function username(): string
    {
        return $this->config->get('auth.username', 'email');
    }

    public function password(): string
    {
        return $this->config->get('auth.password', 'password');
    }

    public function sessionField(): string
    {
        return $this->config->get('auth.session_field', 'id');
    }

    public function id(): ?int
    {
        return $this->session->get($this->sessionField());
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