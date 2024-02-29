<?

namespace App\Kernel\Database;
use App\Kernel\Config\ConfigInterface;
//use App\Kernel\Database\DatabaseInterface;

class Database implements DatabaseInterface
{
    private \PDO $pdo;

    public function __construct(
        private ConfigInterface $config
    )
    {
        $this->connect();
    }

    public function insert(string $table, array $data) : int|false
    {
        $fields = array_keys($data);

        $columns = implode(', ', $fields);
        $binds = implode(', ', array_map(fn ($field) => ":$field", $fields));
    
        $sql = "INSERT INTO $table ($columns) VALUES ($binds)";
        $stmt = $this->pdo->prepare($sql);
        
        try {
            $stmt->execute($data);
        } catch (\PDOException $ex){
            echo "Wrong insert. Error: $ex";
            return false;
        }

        return (int) $this->pdo->lastInsertId();
    }

    public function first(string $table, array $conditions = []) : ?array
    {
        $where = '';
        if (count($conditions) > 0)
        {
            $where = 'WHERE '.implode(' AND ', array_map(fn ($field) => "$field = :$field" , array_keys($conditions)));
        }

        $sql = "SELECT * FROM $table $where LIMIT 1";

        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute($conditions);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function get(string $table, array $conditions = [], array $order = [], int $limit = -1): array
    {
        $where = '';

        if (count($conditions) > 0) {
            $where = 'WHERE '.implode(' AND ', array_map(fn ($field) => "$field = :$field", array_keys($conditions)));
        }

        $sql = "SELECT * FROM $table $where";

        if (count($order) > 0) {
            $sql .= ' ORDER BY '.implode(', ', array_map(fn ($field, $direction) => "$field $direction", array_keys($order), $order));
        }

        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($conditions);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    private function connect()
    {
        $driver = $this->config->get('database.driver');
        $host = $this->config->get('database.host');
        $port = $this->config->get('database.port');   
        $dbname = $this->config->get('database.dbname');
        $username = $this->config->get('database.username');
        $password = $this->config->get('database.password');
        $charset = $this->config->get('database.charset');

        try{
            $this->pdo = new \PDO(
                "$driver:host=$host;port=$port;dbname=$dbname",
                $username,
                $password
            );
        }
        catch (\PDOException $ex){
            exit("Database connection failed: {$ex->getMessage()}");
        }

    }
}