<?php

namespace Src\Models;

use Exception;
use PDO;
use PDOException;
use stdClass;

class Model
{
    public $table;
    public $data = null;
    private $wheres = [];
    private $orWheres = [];
    private $connection;
    private $foreignPivotKey = null;
    private $relatedPivotKey = null;
    private $relatedId = null;
    private $relatedTable = null;

    public function __construct()
    {
        $dbHost = env('DB_HOST');
        $dbUser = env('DB_USERNAME');
        $dbPassword = env('DB_PASSWORD');
        $dbName = env('DB_DATABASE_NAME');

        try {
            $connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $connection;
        } catch(PDOException $e) {
            echo 'Query error: ' . $e->getMessage();
        }
    }

    public function hasTable(): bool
    {
        $query = "SHOW TABLES LIKE '{$this->table}'";

        $statement = $this->connection->query($query);

        return $statement->rowCount() > 0 ? true : false;
    }

    public function where(string $column, string $operator, ?string $value): self
    {
        $this->wheres[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value,
        ];

        return $this;
    }

    public function orWhere(string $column, string $operator, string $value): self
    {
        $this->orWheres[] = [
            'column' => $column,
            'operator' => $operator,
            'value' => $value,
        ];

        return $this;
    }

    public function find(int $id = 1): self
    {
        $this->wheres = [];
        $data = $this->where('id', '=', $id)->get();

        if(!empty($data)):
            $this->data = json_decode(json_encode($data[0]));
        endif;

        return $this;
    }

    public function count(): ?int
    {
        $whereClause = $this->whereClausure();

        $query = "SELECT COUNT(id) as total FROM {$this->table}{$whereClause->clausure}";

        $statement = $this->connection->prepare($query);

        foreach ($whereClause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($data)):
            return (int)$data[0]['total'];
        endif;

        return null;
    }

    public function first(?array $columns = null): ?stdClass
    {
        $columns = !is_null($columns) ? implode(', ', $columns) : '*';

        $whereClause = $this->whereClausure();

        $query = "SELECT {$columns} FROM {$this->table}{$whereClause->clausure} LIMIT 1";

        $statement = $this->connection->prepare($query);

        foreach ($whereClause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($data)):
            $this->data = json_decode(json_encode($data[0]));
        endif;

        return $this->data;
    }

    public function last(?string $orderColumn = null, ?array $columns = null): ?stdClass
    {
        $columns = !is_null($columns) ? implode(', ', $columns) : '*';

        $orderColumn = isset($orderColumn) ? $orderColumn : 'id';

        $whereClause = $this->whereClausure();

        $query = "SELECT {$columns} FROM {$this->table}{$whereClause->clausure} ORDER BY {$orderColumn} DESC LIMIT 1";

        $statement = $this->connection->prepare($query);

        foreach ($whereClause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($data)):
            $this->data = json_decode(json_encode($data[0]));
        endif;

        return $this->data;
    }

    public function create(array $data): ?stdClass
    {
        $columns = implode(', ', array_keys($data));
        $bindings = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$bindings})";

        $statement = $this->connection->prepare($query);

        foreach($data as $indice => $value):
            $statement->bindValue(":{$indice}", $value);
        endforeach;

        $statement->execute();

        $lastInsertId = $this->connection->lastInsertId();

        if($statement->rowCount() > 0 && $this->existColumn('id')):
            $this->find($lastInsertId);

            return $this->data;
        endif;

        return null;
    }

    public function get(?array $columns = null): ?array
    {
        $columns = !is_null($columns) ? implode(', ', $columns) : '*';

        $whereClause = $this->whereClausure();

        $query = "SELECT $columns FROM {$this->table}{$whereClause->clausure}";

        $statement = $this->connection->prepare($query);

        foreach ($whereClause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        $this->data = empty($data) ? null : json_decode(json_encode($data));

        return $this->data;
    }

    public function update(array $data): bool
    {
        $query = '';
        $whereClause = $this->whereClausure();

        foreach($data as $indice => $value):
            $query .= "{$indice} = :d_{$indice}, ";
        endforeach;

        $query = rtrim($query, ', ');

        $query = "UPDATE {$this->table} SET {$query}{$whereClause->clausure}";

        $statement = $this->connection->prepare($query);

        foreach($data as $indice => $value):
            $statement->bindValue(":d_{$indice}", $value);
        endforeach;

        foreach ($whereClause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        return $statement->execute();
    }

    public function delete(): bool
    {
        $whereClause = $this->whereClausure();

        $query = "DELETE FROM {$this->table}{$whereClause->clausure}";

        $statement = $this->connection->prepare($query);

        foreach ($whereClause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        return $statement->execute();
    }

    public function paginate(int $limit, string $orderColumn = 'id'): stdClass
    {
        $count = ceil(($this->count() / $limit));
        $page = ($count == 0 ? 0 : 1);
        $requests = requests();

        if(isset($requests->page)):
            $page = filter_var($requests->page, FILTER_VALIDATE_INT);
            $page = !$page ? 1 : $page;
        endif;

        $start = (($page == 0 ? 1 : $page) * $limit) - $limit;

        $whereClause = $this->whereClausure();

        $query = "SELECT * FROM {$this->table}{$whereClause->clausure} ORDER BY $orderColumn DESC LIMIT $start, $limit";

        $statement = $this->connection->prepare($query);

        foreach ($whereClause->bindings as $column => $value):
            $statement->bindValue(":{$column}", $value);
        endforeach;

        $statement->execute();

        $this->data = json_decode(json_encode($statement->fetchAll(PDO::FETCH_ASSOC)));

        return json_decode(json_encode([
            'count' => $count,
            'page' => ($count == 0 ? 0 : $page),
            'next' => ($page == $count ? null : $page + 1),
            'prev' => (($page == 1 || $page == 0) ? null : $page - 1),
            'data' => $this->data,
            'search' => isset($requests->search) ? $requests->search : null,
            'total' => $this->count(),
        ]));
    }

    public function belongsToMany(string $related, string $table, string $foreignPivotKey, string $relatedPivotKey)
    {
        $related = new $related();

        $id = empty($this->data) ? 0 : $this->data->id;

        $this->setRelatioships($related, $id, $table, $foreignPivotKey, $relatedPivotKey);

        $query = "
            SELECT {$related->table}. *
            FROM {$related->table}
            INNER JOIN {$table} ON {$related->table}.id = {$table}.{$relatedPivotKey}
            WHERE {$table}.{$foreignPivotKey} = :foreign_pivot_key
        ";

        $statement = $this->connection->prepare($query);
        $statement->bindValue(':foreign_pivot_key', $id, PDO::PARAM_INT);
        $statement->execute();

        $related->data = json_decode(json_encode($statement->fetchAll(PDO::FETCH_ASSOC)));

        return $related;
    }

    public function hasMany(string $related, string $table, string $foreignPivotKey)
    {
        $related = new $related();

        $id = empty($this->data) ? 0 : $this->data->id;

        $query = "SELECT * FROM {$table} WHERE {$foreignPivotKey} = :foreign_pivot_key";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':foreign_pivot_key', $id, PDO::PARAM_INT);
        $statement->execute();

        $related->data = json_decode(json_encode($statement->fetchAll(PDO::FETCH_ASSOC)));

        return $related;
    }

    public function belongsTo(string $related, string $table, string $foreignPivotKey)
    {
        $related = new $related();

        $id = empty($this->data) ? 0 : $this->data->id;

        $query = "SELECT * FROM {$table} WHERE id = (SELECT {$foreignPivotKey} FROM {$this->table} WHERE id = :id)";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $related->data = json_decode(json_encode($statement->fetchAll(PDO::FETCH_ASSOC)));

        return $related;
    }

    public function sync(array|int|null $attributes): bool
    {
        if(is_null($attributes)):
            $attributes = [];
        endif;

        if(!is_array($attributes)):
            $attributes = [$attributes];
        endif;

        $existing = [];
        $selectQuery = "SELECT {$this->relatedPivotKey} FROM {$this->relatedTable} WHERE {$this->foreignPivotKey} = :foreign_pivot_key";
        $selectStatement = $this->connection->prepare($selectQuery);
        $selectStatement->bindValue(':foreign_pivot_key', $this->relatedId, PDO::PARAM_INT);
        $selectStatement->execute();

        while ($row = $selectStatement->fetch(PDO::FETCH_ASSOC)):
            $existing[] = $row[$this->relatedPivotKey];
        endwhile;

        $newData = array_diff($attributes, $existing);

        try {
            $this->connection->beginTransaction(); // Start transaction

            $insertQuery = "INSERT IGNORE INTO {$this->relatedTable} ({$this->relatedPivotKey}, {$this->foreignPivotKey}) VALUES (:related_pivot_key, :foreign_pivot_key)";
            $insertStatement = $this->connection->prepare($insertQuery);

            foreach ($newData as $newDataId):
                $insertStatement->bindValue(':related_pivot_key', $newDataId, PDO::PARAM_INT);
                $insertStatement->bindValue(':foreign_pivot_key', $this->relatedId, PDO::PARAM_INT);

                if (!$insertStatement->execute()):
                    throw new Exception('There was an unexpected error during insertion!');
                endif;
            endforeach;

            // $notContains = implode(',', array_fill(0, count($attributes), '?'));
            $notContains = implode(',', $attributes);
            $deleteQuery = "DELETE FROM {$this->relatedTable} WHERE {$this->foreignPivotKey} = :foreign_pivot_key AND {$this->relatedPivotKey} NOT IN ({$notContains})";
            $deleteStatement = $this->connection->prepare($deleteQuery);
            $deleteStatement->bindValue(':foreign_pivot_key', $this->relatedId, PDO::PARAM_INT);

            // foreach ($attributes as $index => $value):
            //     $deleteStatement->bindValue($index + 1, $value, PDO::PARAM_INT);
            // endforeach;

            $deleteStatement->execute();

            $this->connection->commit(); // Confirm transaction

            return true;
        } catch (Exception $e) {
            $this->connection->rollBack(); // Rollback transaction

            return false;
        }
    }

    public function attach(array|int|null $attributes): bool
    {
        if(!is_array($attributes)):
            $attributes = [$attributes];
        endif;

        try {
            $this->connection->beginTransaction(); // Start transaction

            $insertQuery = "INSERT IGNORE INTO {$this->relatedTable} ({$this->relatedPivotKey}, {$this->foreignPivotKey}) VALUES (:related_pivot_key, :foreign_pivot_key)";
            $insertStatement = $this->connection->prepare($insertQuery);

            foreach ($$attributes as $attribute):
                $insertStatement->bindValue(':related_pivot_key', $attribute, PDO::PARAM_INT);
                $insertStatement->bindValue(':foreign_pivot_key', $this->relatedId, PDO::PARAM_INT);

                if (!$insertStatement->execute()):
                    throw new Exception('There was an unexpected error during insertion!');
                endif;
            endforeach;

            $this->connection->commit(); // Confirm transaction

            return true;
        } catch (Exception $e) {
            $this->connection->rollBack(); // Rollback transaction

            return false;
        }
    }

    public function detach(array|int|null $attributes): bool
    {
        if(!is_array($attributes)):
            $attributes = [$attributes];
        endif;

        try {
            $this->connection->beginTransaction(); // Start transaction

            $deleteQuery = "DELETE FROM {$this->relatedTable} WHERE {$this->foreignPivotKey} = :foreign_pivot_key";

            $deleteStatement = $this->connection->prepare($deleteQuery);
            $deleteStatement->bindValue(':foreign_pivot_key', $this->relatedId, PDO::PARAM_INT);
            $deleteStatement->execute();

            $this->connection->commit(); // Confirm transaction

            return true;
        } catch (Exception $e) {
            $this->connection->rollBack(); // Rollback transaction

            return false;
        }
    }

    private function whereClausure(): stdClass
    {
        $whereClause = '';
        $bindings = [];

        foreach ($this->wheres as $index => $where):
            $whereClause .= ($index === 0 ? ' WHERE ' : ' AND ');
            $whereClause .= "{$where['column']} {$where['operator']} :{$where['column']}";
            $bindings[$where['column']] = $where['value'];
        endforeach;

        foreach ($this->orWheres as $index => $where):
            $whereClause .= ' OR ';
            $whereClause .= "{$where['column']} {$where['operator']} :{$where['column']}";
            $bindings[$where['column']] = $where['value'];
        endforeach;

        return json_decode(json_encode([
            'clausure' => $whereClause,
            'bindings' => $bindings,
        ]));
    }

    private function existColumn(string $column): bool
    {
        $dbName = env('DB_DATABASE_NAME');
        $query = 'SELECT COUNT(*) AS colExists
            FROM information_schema.columns
            WHERE table_schema = :dbname
                AND table_name = :table
                AND column_name = :column';

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':dbname', $dbName, PDO::PARAM_STR);
        $stmt->bindParam(':table', $this->table, PDO::PARAM_STR);
        $stmt->bindParam(':column', $column, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['colExists'] > 0 ? true : false;
    }

    private function setRelatioships(mixed $related, int $relatedId, string $relatedTable, string $foreignPivotKey, string $relatedPivotKey): void
    {
        $related->foreignPivotKey = $foreignPivotKey;
        $related->relatedPivotKey = $relatedPivotKey;
        $related->relatedId = $relatedId;
        $related->relatedTable = $relatedTable;
    }
}
