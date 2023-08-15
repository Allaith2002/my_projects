<?php 

class Database {
    private $dbHost = DB_HOST;
    private $dbName = DB_NAME;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;

    private $connection;
    private $statement;
    private $error;

    public function __construct()
    {
        $dsn = "mysql:host={$this->dbHost};dbname={$this->dbName}";

        try {
            $this->connection = new PDO($dsn, $this->dbUser, $this->dbPass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

    public function query(string $sql)
    {
        try {
            $this->statement = $this->connection->prepare($sql);
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to create SQL query in the Database class method query!", 0);
            die('ERROR: Failed to create SQL query in the Database class method query! ' . $ex->getMessage());
        }
    }

    public function bind($parameter, $value, $type = null)
    {
        try {
            if (is_null($type)) {
                switch ($value) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->statement->bindValue($parameter, $value, $type);
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to bind SQL data type in the Database class method bind!", 0);
            die('ERROR: Failed to bind SQL data type in the Database class method bind! ' . $ex->getMessage());
        }
    }

    public function execute(): bool
    {
        try {
            return $this->statement->execute();
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to execute SQL query in the Database class method execute!", 0);
            die('ERROR: Failed to execute SQL query in the Database class method execute! ' . $ex->getMessage());
        }
    }

    public function resultSet(): array
    {
        try {
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get result set in the Database class method resultSet!", 0);
            die('ERROR: Failed to get result set in the Database class method resultSet! ' . $ex->getMessage());
        }
    }

    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(): int
    {
        try {
            return $this->statement->rowCount();
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get a count of rows in the Database class method rowCount!", 0);
            die('ERROR: Failed to get a count of rows in the Database class method rowCount! ' . $ex->getMessage());
        }
    }
}