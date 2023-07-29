<?php

namespace Src\Models;

use PDO;
use PDOException;
use stdClass;

class Model
{
    public $table;
    public $data = null;
    private $wheres = [];
    private $connection;

    /**
     * @since 1.0.0
     * 
     * @return void
     */
    public function __construct()
    {
        $db_host = env('DB_HOST');
        $db_user = env('DB_USERNAME');
        $db_password = env('DB_PASSWORD');
        $db_name = env('DB_DATABASE_NAME');

        try {
            $connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $connection;

        } catch(PDOException $e) {
            echo "Query error: " . $e->getMessage();
        }
    }

    /**
     * @since 1.0.0
     * 
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return self
     */
    public function where(string $column, string $operator, string $value): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value
        ];

        return $this;
    }

    /**
     * @since 1.1.0
     * 
     * @param int $id
     * @return self
     */
    public function find(int $id = 1): self
    {
        $this->wheres = [];
        $data = $this->where('id', '=', $id)->get();

        if(!empty($data)):
            $this->data = json_decode(json_encode($data[0]));
        endif;

        return $this;
    }

    /**
     * @since 1.0.0
     * 
     * @return int|null
     */
    public function count(): int|null
    {
        $where_clause = $this->whereClausure();

        $query = "SELECT COUNT(id) as total FROM {$this->table}{$where_clause->clausure}";

        $statement = $this->connection->prepare($query);

        foreach ($where_clause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($data)):
            return (int)$data[0]['total'];
        endif;

        return null;
    }

    /**
     * @since 1.0.0
     * 
     * @return stdClass|null
     */
    public function first(): stdClass|null
    {
        $where_clause = $this->whereClausure();

        $query = "SELECT * FROM {$this->table}{$where_clause->clausure} LIMIT 1";

        $statement = $this->connection->prepare($query);

        foreach ($where_clause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($data)):
            $this->data = json_decode(json_encode($data[0]));
        endif;

        return $this->data;
    }

    /**
     * @since 1.0.0
     * 
     * @return stdClass|null
     */
    public function last(): stdClass|null
    {
        $where_clause = $this->whereClausure();

        $query = "SELECT * FROM {$this->table}{$where_clause->clausure} ORDER BY id DESC LIMIT 1";

        $statement = $this->connection->prepare($query);

        foreach ($where_clause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($data)):
            $this->data = json_decode(json_encode($data[0]));
        endif;

        return $this->data;
    }

    /**
     * @since 1.0.0
     * 
     * @param array $data
     * @return stdClass|bool
     */
    public function create(array $data): stdClass|null
    {
        $columns = implode(', ', array_keys($data));
        $bindings = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$bindings})";
        
        $statement = $this->connection->prepare($query);

        foreach($data as $indice => $value):
            $statement->bindValue(":{$indice}", $value);
        endforeach;

        $statement->execute();

        if($statement->rowCount() > 0):
            $last_insert_id = $this->connection->lastInsertId();
            $this->find($last_insert_id);

            return $this->data;
        endif;

        return false;
    }

    /**
     * @since 1.2.0
     * 
     * @return array|null
     */
    public function get(): array|null
    {
        $where_clause = $this->whereClausure();

        $query = "SELECT * FROM {$this->table}{$where_clause->clausure}";

        $statement = $this->connection->prepare($query);

        foreach ($where_clause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        $statement->execute();

        $this->data = json_decode(json_encode($statement->fetchAll(PDO::FETCH_ASSOC)));

        return $this->data;
    }

    /**
     * @since 1.0.0
     * 
     * @param array $data
     * @return bool
     */
    public function update(array $data): bool
    {
        $query = '';
        $where_clause = $this->whereClausure();

        foreach($data as $indice => $value):
            $query .= "{$indice} = :d_{$indice}, ";
        endforeach;

        $query = rtrim($query, ', ');

        $query = "UPDATE {$this->table} SET {$query}{$where_clause->clausure}";

        $statement = $this->connection->prepare($query);

        foreach($data as $indice => $value):
            $statement->bindValue(":d_{$indice}", $value);
        endforeach;

        foreach ($where_clause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        return $statement->execute();
    }

    /**
     * @since 1.0.0
     * 
     * @param array $data
     * @return bool
     */
    public function delete(): bool
    {
        $where_clause = $this->whereClausure();

        $query = "DELETE FROM {$this->table}{$where_clause->clausure}";

        $statement = $this->connection->prepare($query);

        foreach ($where_clause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        return $statement->execute();
    }

    /**
     * @since 1.2.0
     * 
     * @param int $limit
     * @param string $order_column
     * @return stdClass
     */
    public function paginate(int $limit, string $order_column = 'id'): stdClass
    {
        $count = ceil(($this->count() / $limit));
        $page = ($count == 0 ? 0 : 1);
        $requests = requests();

        if(isset($requests->page)):
            $page = filter_var($requests->page, FILTER_VALIDATE_INT);
            $page = !$page ? 1 : $page;
        endif;

        $start = (($page ==  0 ? 1 : $page) * $limit) - $limit;

        $where_clause = $this->whereClausure();

        $query = "SELECT * FROM {$this->table}{$where_clause->clausure} ORDER BY $order_column DESC LIMIT $start, $limit";

        $statement = $this->connection->prepare($query);

        foreach ($where_clause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        $statement->execute();

        $this->data = json_decode(json_encode($statement->fetchAll(PDO::FETCH_ASSOC)));

        return json_decode(json_encode([
            'count' => $count,
            'page' => ($count == 0 ? 0 : $page),
            'next' => ($page == $count ? null : $page+1),
            'prev' => (($page == 1 || $page == 0) ? null : $page-1),
            'data' => $this->data,
            'search' => isset($requests->search) ? $requests->search : null,
            'total' => $this->count()
        ]));
    }

    /**
     * @since 1.0.0
     * 
     * @return stdClass
     */
    private function whereClausure(): stdClass
    {
        $where_clause = '';
        $bindings = [];

        foreach ($this->wheres as $index => $where):
            $where_clause .= ($index === 0 ? ' WHERE ' : ' AND ');
            $where_clause .= "{$where['column']} {$where['operator']} :{$where['column']}";
            $bindings[$where['column']] = $where['value'];
        endforeach;

        return json_decode(json_encode([
            'clausure' => $where_clause,
            'bindings' => $bindings
        ]));
    }
}
