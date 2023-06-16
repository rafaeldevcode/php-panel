<?php

namespace Src\Migrations;

use Exception;
use mysqli;

class CreateTables
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
            
            if ( mysqli_connect_errno()) {
                throw new Exception("Connection faied");   
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }
    }

    /**
     * @param string $query
     * @return void
     */
    protected function execute($query): void
    {
        try {
            $stmt = $this->executeStatement($query);		
            $stmt->close();
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }

    /**
     * @param string $query
     * @return mixed
     */
    protected function executeStatement($query)
    {
        try {
            $stmt = $this->connection->prepare( $query );

            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }

            $stmt->execute();

            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	
    }

    /**
     * @param string $table_migration
     * @return bool
     */
    public function createMigration(string $table_migration): bool
    {
        self::execute("CREATE TABLE IF NOT EXISTS migrations(
            `name` VARCHAR(30) NOT NULL UNIQUE,
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        )");

        $stmt = $this->executeStatement("SELECT * FROM migrations WHERE name = '$table_migration'");	
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);	
        $stmt->close();

        return empty($result) ? false : true;
    }

        /**
     * @param string $table_migration
     * @return bool
     */
    public function updateMigration(string $table_migration): bool
    {
        $stmt = $this->executeStatement("SELECT * FROM migrations WHERE name = '$table_migration'");	
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);	
        $stmt->close();

        if(empty($result)):

            $stmt = $this->executeStatement("INSERT INTO migrations(name) VALUES ('$table_migration')");		
            $stmt->close();            

            return false;
        else:

            return true;
        endif;
    }
}
