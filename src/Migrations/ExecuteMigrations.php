<?php

namespace Src\Migrations;

use Exception;
use PDO;
use PDOException;

class ExecuteMigrations
{
    private $connection = null;
    private $columns = [];
    private $currentColumn = [];
    private $currentIndice = 0;
    private $currentForeignKey = 0;
    private $timestamps = false;
    private $constraint = [];
    public $table;

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

    public function __call(string $method, array $arguments): self
    {
        if (isset($arguments[0])) {
            $lenght = isset($arguments[1]) ? $arguments[1] : 255;

            $this->currentColumn = [
                'column_name' => $arguments[0],
                'column_type' => $this->getColumnType($method, (int)$lenght),
                'nullable' => ' NOT NULL',
                'default' => '',
                'primary_key' => '',
                'unique' => '',
            ];

            $this->columns[] = $this->currentColumn;

            $this->currentIndice = count($this->columns) - 1;
        };

        return $this;
    }

    public function nullable(): self
    {
        if (empty($this->columns[$this->currentIndice]['default'])) {
            $this->columns[$this->currentIndice]['nullable'] = ' DEFAULT NULL';
        };

        return $this;
    }

    public function default(string $value): self
    {
        if ($this->columns[$this->currentIndice]['nullable'] == ' NOT NULL') {
            $this->columns[$this->currentIndice]['default'] = " DEFAULT '{$value}'";
        };

        return $this;
    }

    public function unique(): self
    {
        $this->columns[$this->currentIndice]['unique'] = ' UNIQUE';

        return $this;
    }

    public function timestamps(): self
    {
        $this->timestamps = true;

        return $this;
    }

    public function primaryKey(): self
    {
        $this->columns[$this->currentIndice]['primary_key'] = ' AUTO_INCREMENT PRIMARY KEY';

        return $this;
    }

    public function foreignKey(string $foreignKey): self
    {
        $this->constraint[] = [
            'foreign_key' => $foreignKey,
        ];

        $this->currentForeignKey = count($this->constraint) - 1;

        return $this;
    }

    public function references(string $columnReferences): self
    {
        $this->constraint[$this->currentForeignKey]['column_references'] = $columnReferences;

        return $this;
    }

    public function on(string $table): self
    {
        $this->constraint[$this->currentForeignKey]['table'] = $table;

        return $this;
    }

    public function create(): void
    {
        $query = "CREATE TABLE IF NOT EXISTS $this->table";
        $countColumn = count($this->columns);

        if ($countColumn > 0) {
            $query .= ' (';
        }

        foreach ($this->columns as $column) {
            $columnName = $column['column_name'];
            $columnType = $column['column_type'];
            $nullable = $column['nullable'];
            $default = $column['default'];
            $primaryKey = $column['primary_key'];
            $unique = $column['unique'];

            $query .= "`{$columnName}` {$columnType}{$nullable}{$default}{$primaryKey}{$unique}, ";
        };

        if ($this->timestamps) {
            $query .= '`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP';
        };

        if ($countColumn > 0) {
            $query .= ')';
        }
        $query = str_replace(', )', ')', $query);

        $this->connection->exec($query);

        if (!empty($this->constraint)) {
            foreach ($this->constraint as $key) {
                $query = "ALTER TABLE {$this->table} ADD KEY `fk_{$key['table']}_{$this->table}` (`{$key['foreign_key']}`)";
                $this->connection->exec($query);

                $query = "ALTER TABLE {$this->table} ADD CONSTRAINT `fk_{$key['table']}_{$this->table}` FOREIGN KEY (`{$key['foreign_key']}`) REFERENCES `{$key['table']}` (`{$key['column_references']}`)";
                $this->connection->exec($query);
            };
        };
    }

    public function dropColumn(string $column): self
    {
        $query = "ALTER TABLE {$this->table} DROP COLUMN :{$column};";
    
        $statement = $this->connection->prepare($query);
    
        $statement->bindParam(":{$column}", $column, PDO::PARAM_STR);
    
        $statement->execute();

        return $this;
    }

    public function dropTable(): void
    {
        $query = "DROP TABLE {$this->table}";

        $statement = $this->connection->prepare($query);

        $statement->execute();
    }
    
    public function verifyExistsMigrations(): bool
    {
        $tableName = 'migrations';

        $query = 'SHOW TABLES LIKE :table_name';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':table_name', $tableName, PDO::PARAM_STR);
        $statement->execute();

        return $statement->rowCount() > 0 ? true : false;
    }

    private function getColumnType(string $method, int $lenght = 255): string
    {
        switch ($method) {
            case 'string':
                return "VARCHAR({$lenght})";
            case 'integer':
                return 'INT';
            case 'char':
                return "CHAR({$lenght})";
            case 'date':
                return 'DATE';
            case 'datetime':
                return 'DATETIME';
            case 'text':
                return "TEXT({$lenght})";
            case 'longtext':
                return 'LONGTEXT';
            case 'boolean':
                return 'BOOLEAN';
            case 'decimal':
                return 'DECIMAL';
            case 'double':
                return 'DOUBLE';
            default:
                throw new Exception("Tipo de coluna inválido: {$method}");
        };
    }
}
