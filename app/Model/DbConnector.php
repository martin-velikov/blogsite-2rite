<?php

class DbConnector
{
    private $connection;
    private static $instance;

    public static function getInstance()
    {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER,
            DB_PASSWORD, DB_NAME);

        if(mysqli_connect_error() || !$this->connection) {
            trigger_error("Failed to connect to to MySQL: " . mysqli_connect_error(),
                E_USER_ERROR);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function executeQuery($sql, ...$params)
    {
        $connect = $this->connection->prepare($sql);

        if (count($params)) {
            $connect->bind_param(...$params);
        }
        $connect->execute();

        return $connect->get_result();
    }
}