<?php

namespace Src\Models;

use Exception;
use mysqli;

class Model
{
    protected $connection = null;
    public $table;

    /**
     * @return void
     */
    public function __construct()
    {
        try {
            $this->connection = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE_NAME'));
            
            if ( mysqli_connect_errno()):
                throw new Exception("Connection faied");   
            endif;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }			
    }

    /**
     * @param array $data
     * @return bool
     */
    public function  create(array $data): bool
    {
        try {
            $keys = implode(',', array_keys($data));
            $values = implode("','", array_values($data));
            $query = "INSERT INTO $this->table ($keys) VALUES ('$values');";

            $stmt = $this->executeStatement($query);			
            $stmt->close();

            return true;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );

            return false;
        }
        return false;
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool|array
     */
    public function  update(array $data, int $id): bool|array
    {
        try {
            $query = '';

            foreach($data as $indice => $value):
                $query = $query."{$indice}='{$value}',";
            endforeach;

            $query = rtrim($query, ',');

            $query = "UPDATE $this->table SET $query WHERE id = $id;";

            $stmt = $this->executeStatement($query);			
            $stmt->close();

            return $this->find($id)[0];
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );

            return false;
        }
        return false;
    }

    /**
     * @param int $id
     * @return bool|array
     */
    public function  delete(int $id): bool
    {
        try {
            $stmt = $this->executeStatement("DELETE FROM $this->table WHERE id = $id;");			
            $stmt->close();

            return true;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );

            return false;
        }
        return false;
    }

    /**
     * @param int $ID
     * @return array
     */
    public function  find(int $ID): array
    {
        $response = self::execute("SELECT * FROM $this->table WHERE id = '$ID';");

        return $response;
    }

    /**
     * @param string $column
     * @param string|int $value
     * @param string $operator
     * @return array
     */
    public function  where(string $column, $value, string $operator = '='): array
    {
        $response = self::execute("SELECT * FROM $this->table WHERE $column $operator '$value';");

        return $response;
    }

    /**
     * @param string $column
     * @param array $values
     * @return array
     */
    public function  whereIn(string $column, array $values): array
    {
        $query = "SELECT * FROM $this->table WHERE $column = 0";

        foreach($values as $value):
            $query .= " OR $column = '$value'";
        endforeach;

        $response = self::execute("$query;");

        return $response;
    }

    /**
     * @return array
     */
    public function first(): array
    {
        $response = self::execute("SELECT * FROM $this->table LIMIT 1;");

        return $response;
    }

    /**
     * @param string $orderby_column
     * @param string $orderby
     * @return array
     */
    public function  all(string $orderby_column = 'id', string $orderby = 'asc'): array
    {
        $response = self::execute("SELECT * FROM $this->table ORDER BY $orderby_column $orderby;");

        return $response;
    }

    /**
     * @param int $limit
     * @param string $order_column
     * @param array|null $where
     * @return array
     */
    public function  paginate(int $limit, $order_column, array|null $where): array
    {
        $where = !is_null($where) ? implode(' ', $where) : $where;
        $count = ceil(($this->count() / $limit));
        $page = ($count == 0 ? 0 : 1);

        if(isset($_POST['page'])):
            $page = filter_input(INPUT_POST, 'page', FILTER_VALIDATE_INT);
            $page = !$page ? 1 : $page;
        endif;

        $start = (($page ==  0 ? 1 : $page) * $limit) - $limit;

        $query = is_null($where) 
            ? "SELECT * FROM $this->table ORDER BY $order_column DESC LIMIT $start, $limit;"
            : "SELECT * FROM $this->table WHERE $where ORDER BY $order_column LIMIT $start, $limit;";
            
        return [
            'count'  => $count,
            'page'   => ($count == 0 ? 0 : $page),
            'next'   => ($page == $count ? null : $page+1),
            'prev'   => (($page == 1 || $page == 0) ? null : $page-1),
            'data'   => $this->execute($query),
            'search' => isset($_POST['search']) ? $_POST['search'] : null
        ];
    }

    /**
     * @param string $query
     * @param string $select
     * @return array
     */
    public function filterSafes(string $query, string $select): array
    {
        $query = "SELECT $select FROM $this->table $query;";

        $response = self::execute($query);

        return $response;
    }

    /**
     * @param int|null $column
     * @param int|null $value
     * @return int
     */
    public function  count(string|null $column = null, string|null $value = null): int
    {
        if(isset($column) && isset($value)):

            $response = self::execute("SELECT COUNT(id) as total FROM $this->table WHERE $column = '$value';");
        else:

            $response = self::execute("SELECT COUNT(id) as total FROM $this->table;");
        endif;

        return empty($response) ? 0 : $response[0]['total'];
    }

    protected function execute($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
            $stmt->close();

            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    private function executeStatement($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare( $query );

            if($stmt === false):
                throw New Exception("Unable to do prepared statement: " . $query);
            endif;

            if( $params ):
                $stmt->bind_param($params[0], $params[1]);
            endif;

            $stmt->execute();

            if($stmt->errno > 0):
                throw New Exception($stmt->error);
            endif;

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	
    }
}
