<?php

namespace Src\Database;

class DB {

    private $connection;

    public function __construct() {
        try {
            $this->connection = new \PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT, 
                DB_USER, 
                DB_PASS
            );
        } catch (\PDOException $e) {

            throw new \Exception("Ocorreu um erro ao tentar conectar no banco!", 1);
        
        } catch (\Exception $e) {
        
            throw new \Exception("Ocorreu um erro ao tentar conectar no banco!", 1);
        
        }
    }

    public function getConn() {
        return $this->connection;
    }


}